<?php

class SiteController extends Controller
{
	public $code;
	// public $layout = "seastar";
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
				'actions'=>array('index','login','logout','error'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('settings'),
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
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		if(isset($_GET['getkids']) && $_GET['getkids'] == 'all'){
			$criteria =new CDbCriteria;
			$criteria->select = 'id,name,avatar,create_time,status';
			$criteria->order = 'create_time DESC';

			$children = Childcase::model()->findAll( $criteria );

			$kids = array();
			$d = array();
			foreach ($children as $key => $child) {
				if($child->status == 2 || $child->status == 3){
					$date = substr($child->create_time,0,4);
					$kid['id'] = $child->id;
					$kid['name'] = $child->name;
					$kid['avatar'] = $child->avatar;
					$d[$date][] = $kid;
				}
			}
			header('Content-type: application/json');
      $json = CJSON::encode($d);
  		echo $_GET['callback'] . ' (' . $json . ');';
		}else{
		$this->redirect('/childcase/index');
		}
	}

	public function actionChildren()
	{
		$children = Childcase::model()->findAll();
		$kids = array();
		foreach ($children as $key => $child) {
			if($child->status == 2 || $child->status == 3){
				$kid['id'] = $child->id;
				$kid['name'] = $child->name;
				$kid['avatar'] = $child->avatar;
				array_push($kids,$kid);
			}
		}
		header('Content-type: application/json');
    echo CJSON::encode($kids);
	}
	public function actionSettings()
	{
		$id = Yii::app()->user->id;
		$model = User::model()->findByPk($id);
		$model->scenario='password';

		$this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->validate() && $model->save()){
				Yii::app()->user->setFlash('success',Yii::t('site','Great, change information successed!'));
				$this->redirect(array('settings'));
			}
		}

		$this->render('settings',array(
			'model'=>$model,
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	protected function performAjaxValidation($model)
  {
    if(isset($_POST['ajax']) && $_POST['ajax']==='password-form')
    {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }
}