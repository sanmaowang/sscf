<?php

class OrgContactController extends Controller
{
	public $code = "OrgContact";
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
				'actions'=>array('create','update','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'expression'=>'Yii::app()->user->isAdmin()'
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
		$org = $model->org;
		$breadcrumbs = array();
		$breadcrumbs[$org->name] = array('org/view','id'=>$org->id);
		$menu = $this->showBread($org, $breadcrumbs);

		$this->render('view',array(
			'model'=>$model,
			'menu' =>$menu
		));
	}

	private function showBread($obj,$breadcrumbs = array())
	{
		if((int)$obj->parent_id > 0){
			$breadcrumbs[$obj->parent->name] = array('org/view','id'=>$obj->parent_id);
			return $this->showBread(Org::model()->findByPk($obj->parent_id), $breadcrumbs);
		}else{
			return $breadcrumbs;
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($oid)
	{
		$model=new OrgContact;

		$org = Org::model()->findByPk($oid);
		// $breadcrumbs = array();
		// $breadcrumbs[$org->name] = array('org/view','id'=>$org->id);
		// $menu = $this->showBread($org, $breadcrumbs);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OrgContact']))
		{
			$model->attributes=$_POST['OrgContact'];
			$model->org_id = $oid;
			if($model->save())
				$this->redirect(array('org/view','id'=>$org->id));
		}
		$this->render('create',array(
			'model'=>$model,
			'oid'=>$oid,
			// 'menu'=>$menu,
			'org'=>$org
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

		$org = $model->org;
		// $breadcrumbs = array();
		// $breadcrumbs[$org->name] = array('org/view','id'=>$org->id);
		// $menu = $this->showBread($org, $breadcrumbs);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OrgContact']))
		{
			$model->attributes=$_POST['OrgContact'];
			if($model->save())
				$this->redirect(array('org/view','id'=>$org->id));
		}

		$this->render('update',array(
			'model'=>$model,
			'org'=>$org
			// 'menu'=>$menu
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
			$this->loadModel($id)->delete();
			if(Yii::app()->request->isAjaxRequest)
			{
			  echo CJSON::encode(array("id"=>$id));
			}
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('OrgContact');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new OrgContact('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OrgContact']))
			$model->attributes=$_GET['OrgContact'];

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
		$model=OrgContact::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='org-contact-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
