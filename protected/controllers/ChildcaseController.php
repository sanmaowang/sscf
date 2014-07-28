<?php

class ChildcaseController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';
	public $code = "Childcase";

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
				'actions'=>array('create','update','updatecase','admin','delete','submit'),
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
		$this->render('view',array(
			'model'=>$model,
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Childcase']))
		{
			$model->attributes=$_POST['Childcase'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create_case',array(
			'model'=>$model,
			'users'=>User::model()->findAll(),
			'orgs'=>Org::model()->findAll( 'type < 3')
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

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

		$this->render('update',array(
			'model'=>$model,
			'flag'=>$flag,
			'fmodel'=>new CaseFamily(),
			'amodel'=>new CaseFile()
		));
	}

	public function actionUpdateCase($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

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

		$this->render('update_case',array(
			'model'=>$model,
			'users'=>User::model()->findAll(),
			'orgs'=>Org::model()->findAll( 'type < 3')
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

    $criteria = (isset($_GET['status']))?array('condition'=>'status='.$_GET['status']):array();
 		
 		if(isset($_POST['name'])){
			$criteria =  array(
		    'condition' => "name LIKE :match OR nickname LIKE :match", 
		    'params'    => array(':match' => $_POST['name']));
		}

    $options = array(
        'criteria'=> $criteria,
        'pagination'=>array(
            'pageSize'=>20,
        ),
    );

		$dataProvider=new CActiveDataProvider('Childcase',$options);
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'new_count'=>$new_count,
			'pending_count'=>$pending_count,
			'confirm_count'=>$confirm_count,
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
				$this->redirect('/childcase/view',array(
					'id'=>$id,
				));
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
