<?php

class ChildcaseController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';
	public $code = "Childcase";
	public $filespath = array();

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','updatecase','delete','submit','check','casetracking','casetrackinglog'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$orgs = Org::model()->findAll();
		$this->render('view',array(
			'model'=>$model,
			'orgs'=>$orgs,
			'hospital'=>$model->operation_hospital?Org::model()->findByPk($model->operation_hospital):null,
			'doctor'=>$model->doctor?OrgContact::model()->findByPk($model->doctor):null
		));
	}

	public function actionCheck($id)
	{
		$model = $this->loadModel($id);
		// calcuate the rate
		$errors = array();
		$arr = array('nickname','address','family_note','other_note');
		foreach ($model->attributes as $key => $value) {
			if($value != 0 && !$value && !in_array($key, $arr)){
				$errors[] = "缺失 - [".$model->getAttributeLabel($key)."] - ".$key;
			}
		}
		$files = CaseFile::model()->findAllByAttributes(array('case_id'=>$model->id));
		$requires = FileArray::getRequiredFiles();
		$existArr = array();
		foreach ($files as $file) {
			$existArr[] .= $file->key;			
		}

		foreach ($requires as $key => $value) {
			if(!in_array($value,$existArr)){
				$errors[] = "缺失 - [".FileArray::getLabel($value)."]";
			}
		}

		$rate = 100 -  (int)(100 * (count($errors) / count($model->attributes)));
		$this->render('check',array(
			'model'=>$model,
			'errors'=>$errors,
			'rate'=>$rate
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Childcase;
		$model->create_by = Yii::app()->user->id;

		$model->scenario = 'case';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Childcase']))
		{
			$model->attributes=$_POST['Childcase'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$orgs = Org::model()->findAll();

		$this->render('create_case',array(
			'model'=>$model,
			'users'=>User::model()->findAll(),
			'orgs'=>$orgs
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id,$flag)
	{
		$this->layout = "//layouts/column2";
		$model=$this->loadModel($id);

		$model->scenario = $flag;

		$orgs = null;
		// $next_flag = $flag;
		// $flags = array('child','family','other','medical','economic','chris');
		// if(in_array($flag, $flags)){
		// 	$index = array_search($flag,$flags);
		// 	if( $index + 1 < 6){
		// 		$next_flag = $flags[$index+1];
		// 	}
		// }

		// if($flag !='case'){
		// }else{
		// 	$next_flag = 'child';
		// }
		if($flag =="economic"){
			$orgs = Org::model()->findAll();
		}


		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Childcase']))
		{
			if($model->avatar){
				$avatar = $model->avatar;
			}
			
			$model->attributes=$_POST['Childcase'];

			$file=CUploadedFile::getInstance($model,'avatar');

      if(!empty($file))
      {
        $fileName = 'avatar_'.time().'.'.$file->extensionName;
        $model->avatar = $fileName;
        $file->saveAs(Yii::app()->basePath.'/../uploads/avatar/'.$model->avatar);
      }else{
      	$model->avatar = $avatar;
      }

			if($flag == 'family'){
				$model->economical_source_desc = $_POST['Childcase']['economical_source_desc'];
				$model->special_desc = $_POST['Childcase']['special_desc'];
			}
			if($model->save()){
      	Yii::app()->user->setFlash('success', "保存成功");
				$this->redirect(array('update','id'=>$model->id,'flag'=>$flag));
			}
		}


		$this->render('update',array(
			'model'=>$model,
			'flag'=>$flag,
			'fmodel'=>new CaseFamily($flag),
			'amodel'=>new CaseFile(),
			'bmodel'=>new CaseBudget(),
			'orgs'=>$orgs
		));
	}

	public function actionUpdateCase($id)
	{
		$this->layout = "//layouts/column2";
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->scenario = 'case';


		if(isset($_POST['Childcase']))
		{
			$model->attributes=$_POST['Childcase'];
			if($flag == 'family'){
				$model->economical_source_desc = $_POST['Childcase']['economical_source_desc'];
				$model->special_desc = $_POST['Childcase']['special_desc'];
			}
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$orgs = Org::model()->findAll();
		// $o = array();
		// foreach ($orgs as $key => $org) {
		// 	if($org->parent_id == 0){
		// 		$o[$org->id] = $org;
		// 	}else{
		// 		$o[$org->parent_id]['sub'][] = $org;
		// 	}
		// }

		$this->render('update_case',array(
			'model'=>$model,
			'users'=>User::model()->findAll(),
			'orgs'=>$orgs,
			'flag'=>'case',
		));
	}


	public function actionCaseTracking($id)
	{
		$this->layout = "//layouts/column2";
		$model=$this->loadModel($id);
		$caseTracking = CaseTracking::model()->findByAttributes(array('case_id'=>$id));
		if(count($caseTracking) == 0){
			$caseTracking = new CaseTracking;
			$caseTracking->case_id = $id;
			$caseTracking->save();
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->scenario = 'casetracking';

		if(isset($_POST['CaseTracking']))
		{
			$caseTracking->attributes=$_POST['CaseTracking'];
			if($caseTracking->save())
				$this->redirect(array('casetracking','id'=>$model->id));
		}

		$this->render('case_tracking',array(
			'model'=>$model,
			'caseTracking'=>$caseTracking,
			'flag'=>'tracking'
		));
	}

	public function actionCaseTrackingLog($mid,$tid,$sid)
	{
		$this->layout = "//layouts/column2";
		$model=$this->loadModel($mid);
		$caseTracking = CaseTracking::model()->findByPk($tid);
		
		$model->scenario = 'casetracking';

		$trackinglogs = CaseTrackingLog::model()->findAll(array(
				'select' =>array('log_time,id,log_content'),
	  		'order' => 'id DESC',
				'condition' => 'tracking_id = :tid AND step = :sid',
				'params' => array(':tid'=>$tid,':sid'=>$sid),
		));

		$log = new CaseTrackingLog;

		if(isset($_POST['CaseTrackingLog']))
		{
			$log->attributes=$_POST['CaseTrackingLog'];
			$log->tracking_id = $tid;
			$log->step = $sid;
			if($log->save())
				$this->redirect(array('casetrackingLog','mid'=>$mid,'tid'=>$tid,'sid'=>$sid));
		}

		$this->render('case_tracking_log',array(
			'model'=>$model,
			'caseTracking'=>$caseTracking,
			'trackinglogs'=>$trackinglogs,
			'sid'=>$sid,
			'log'=>$log,
			'flag'=>'tracking'
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{

		$this->loadModel($id)->delete();
		if(Yii::app()->request->isAjaxRequest)
		{
		  echo CJSON::encode(array("id"=>$id));
		}

		// $this->loadModel($id)->delete();

		// // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		// if(!isset($_GET['ajax']))
		// 	$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$new_count = Childcase::model()->countByAttributes(array(
            'status'=> 0
        ));
		$pending_count = Childcase::model()->countByAttributes(array(
            'status'=> 1
        ));
		$confirm_count = Childcase::model()->countByAttributes(array(
            'status'=> 2
        ));
		$funded_count = Childcase::model()->countByAttributes(array(
            'status'=> 3
        ));
		$passed_count = Childcase::model()->countByAttributes(array(
            'status'=> 4
        ));
		$over_count = Childcase::model()->countByAttributes(array(
            'status'=> 5
        ));
		$deceased_count = Childcase::model()->countByAttributes(array(
            'status'=> 6
        ));

    $criteria = (isset($_GET['status']))?array('condition'=>'status='.$_GET['status']):array();
 		
 		if(isset($_POST['name'])){
			$criteria =  array(
		    'condition' => "name LIKE :match OR nickname LIKE :match", 
		    'params'    => array(':match' => $_POST['name']));
		}


    $options = array(
        'criteria'=> $criteria,
        'pagination'=>array(
            'pageSize'=>10,
        ),
        'sort'=>array(
            'defaultOrder'=>'id DESC',
        ),
    );

		$dataProvider=new CActiveDataProvider('Childcase',$options);
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'new_count'=>$new_count,
			'pending_count'=>$pending_count,
			'confirm_count'=>$confirm_count,
			'funded_count'=>$funded_count,
			'passed_count'=>$passed_count,
			'over_count'=>$over_count,
			'deceased_count'=>$deceased_count,
		));
	}

	public function actionSubmit($id)
	{
		if(isset($_POST['status'])){
			$model=$this->loadModel($id);
			$model->status = $_POST['status'];
			if($model->save()){
				// if(Yii::app()->request->isAjaxRequest)
				// {
				//   echo CJSON::encode(array("id"=>$id));
				// }
				$this->redirect(array('/childcase/view','id'=>$model->id));
				
			}
		}

	}


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Childcase('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Childcase']))
			$model->attributes=$_GET['Childcase'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Childcase the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Childcase::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Childcase $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='childcase-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
