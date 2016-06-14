<?php

class MedicalInfoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';
	public $code ="Childcase";

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
				'actions'=>array('create','update','delete'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id,$type)
	{
		$model=new MedicalInfo;
		
	  $model->case_id = $id;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MedicalInfo']))
		{
			$model->attributes=$_POST['MedicalInfo'];
			if($model->save())
				$this->redirect(array('childcase/update','id'=>$id,'flag'=>'chris'));
		}

  	$folder_type = array("under review","funded","passed");
		$folder = $folder_type[$model->case->folder];
		$files = CaseFile::model()->findAllByAttributes(array('case_id'=>$id,'key'=>$type));

		$arr = array();
		foreach ($files as $key => $file) {
			$result = MedicalInfo::model()->findByAttributes(array('file_id'=>$file->id));
			if(count($result) == 0){
				$arr[] = $file;
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'files'=>$arr,
			'folder'=>$folder,
			'type'=>$type,
			'id'=>$id
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MedicalInfo']))
		{
			$model->attributes=$_POST['MedicalInfo'];
			if($model->save())
				$this->redirect(array('childcase/update','id'=>$model->case_id,'flag'=>'chris'));
		}

		$folder_type = array("under review","funded","passed");
		$case = Childcase::model()->findByPk($model->case_id);
		$folder = $folder_type[$case->folder];

		$files = CaseFile::model()->findAllByAttributes(array('case_id'=>$model->case_id,'key'=>'mbg_echocardiography'));

		$this->render('update',array(
			'model'=>$model,
			'files'=>$files,
			'folder'=>$folder
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
		
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('MedicalInfo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new MedicalInfo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MedicalInfo']))
			$model->attributes=$_GET['MedicalInfo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MedicalInfo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=MedicalInfo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MedicalInfo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='medical-info-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
