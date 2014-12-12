<?php

class CaseBudgetController extends Controller
{
	public $code = "CaseBudget";
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
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
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
	public function actionCreate($case_id,$fee_type)
	{
		$model=new CaseBudget;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['CaseBudget']))
		{
			$model->attributes=$_POST['CaseBudget'];
			$model->type = $_POST['CaseBudget']['type'];
			$model->last_date = $_POST['CaseBudget']['last_date'];
			$model->case_id = $case_id;
			$model->fee_type = $fee_type;
			if($model->save()){
				$this->redirect(array('/childcase/update','id'=>$model->case_id,'flag'=>'economic'));
			}
		}


		if($_GET['type']){
			$orgs = Org::model()->findAll( 'type < 2 && parent_id = 0');
			// $case = Childcase::model()->findByPk($case_id);
			// $orgs[] = $case->operation_hospital;
		}else{
			$orgs = Org::model()->findAll( 'type > 1 && parent_id = 0');
		}

		$this->render('create',array(
			'model'=>$model,
			'orgs'=>$orgs
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
		$this->performAjaxValidation($model);

		if(isset($_POST['CaseBudget']))
		{
			$model->attributes=$_POST['CaseBudget'];
			$model->type = $_POST['CaseBudget']['type'];
			$model->last_date = $_POST['CaseBudget']['last_date'];

			if($model->save()){
				$this->redirect(array('/childcase/update','id'=>$model->case_id,'flag'=>'economic'));
			}
		}

		if($model->type == 'hospital_budget' || $model->type == 'hospital_cost'){
			$orgs = Org::model()->findAll( 'type < 2 && parent_id = 0');
		}else{
			$orgs = Org::model()->findAll( 'type > 1 && parent_id = 0');
		}



		$this->render('update',array(
			'model'=>$model,
			'orgs'=>$orgs,
			'first'=>$model->last_date?'1':null
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('CaseBudget');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CaseBudget('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CaseBudget']))
			$model->attributes=$_GET['CaseBudget'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=CaseBudget::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='case-budget-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
