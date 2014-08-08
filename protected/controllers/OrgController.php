<?php

class OrgController extends Controller
{
	public $code = "Org";
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
				'actions'=>array('create','update','admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	private function showBread($obj,$breadcrumbs = array())
	{
		if((int)$obj->parent_id > 0){
			$breadcrumbs[$obj->parent->name] = array('view','id'=>$obj->parent_id);
			return $this->showBread($this->loadModel($obj->parent_id), $breadcrumbs);
		}else{
			return $breadcrumbs;
		}
	}

	public function actionView($id)
	{	
		$model = $this->loadModel($id);
		$menu = $this->showBread($model, array());

		$contacts = OrgContact::model()->findAllByAttributes(array('org_id'=>$id));
		$this->render('view',array(
			'menu'=>$menu,
			'model'=>$model,
			'contacts'=>$contacts
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Org;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_GET['pid'])){
			$parent_id = $_GET['pid'];
			$parent = $this->loadModel($parent_id);
		}else{
			$parent_id = 0;
			$parent = null;
		}

		if(isset($_POST['Org']))
		{
			$model->attributes=$_POST['Org'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
			'parent'=>$parent,
			'parent_id'=>$parent_id
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
		$allorg = Org::model()->findAll();
		$all = array();
		$all[0] = "无所属机构";
		foreach ($allorg as $a) {
			$all[$a->id] = $a->name;
		}

		if(isset($_POST['Org']))
		{
			$model->attributes=$_POST['Org'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
			'all' => $all
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
		$criteria = (isset($_GET['parent_id']))?array('condition'=>'parent_id ='.$_GET['parent_id']):array(
		    'condition' => "parent_id = 0", 
		);
 		
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

		$dataProvider=new CActiveDataProvider('Org',$options);
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Org('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Org']))
			$model->attributes=$_GET['Org'];

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
		$model=Org::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='org-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
