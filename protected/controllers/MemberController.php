<?php

class MemberController extends Controller
{

	public $code = "member";
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('update','password'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'expression'=>'Yii::app()->user->isAdmin()'
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$model = $this->loadModel(Yii::app()->user->id);
		$this->render('index',array('data'=>$model));
	}

	public function actionPassword()
	{
		$id = Yii::app()->user->id;
		$model=$this->loadModel($id);
		$model->scenario='password';

		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->validate() && $model->save()){
				Yii::app()->user->setFlash('success','Great, change password successed!');
				$this->redirect(array('password'));
			}
		}

		$this->render('password',array(
			'model'=>$model,
		));
	}

	public function actionUpdate()
	{
		$id = Yii::app()->user->id;
		$model=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			if(empty($_POST['User']['avatar'])){
        $_POST['User']['avatar'] = $model->avatar;
      }

			$model->attributes=$_POST['User'];

      $avatar=CUploadedFile::getInstance($model,'avatar');
      if(!empty($avatar))
      {
        $fileName = $id.'_'.time().'.'.$avatar->extensionName;
        $model->avatar = $fileName;
        $avatar->saveAs(Yii::app()->basePath.'/../uploads/avatar/'.$model->avatar);
        $path = Yii::getPathOfAlias('webroot').'/uploads/avatar/';
        $image_file = Yii::app()->image->load($path.'/'.$model->avatar );
        if($image_file->width > 120 || $image_file->height > 120){
        	if($image_file->width/$image_file->height > 1){
        		$image_file->resize(NULL,120)->quality(95);
        		$image_file->crop(120,120);
        	}else{
        		$image_file->resize(120, NULL)->quality(95);
        		$image_file->crop(120,120);
        	}
          $image_file->save();
        }
      }
      if(!$model->validate())
			{
				Yii::app()->user->setFlash('error',$model->getErrors());
				$this->redirect(array('index'));
			}
			if($model->validate() && $model->save()){
				Yii::app()->user->setFlash('success','Great, change information successed!');
				$this->redirect(array('index'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
  {
    if(isset($_POST['ajax']) && $_POST['ajax']==='familyfriend-form')
    {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }
}