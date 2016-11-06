<?php

class ConferenceController extends Controller
{
	public $code = "Conference";
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
				'actions'=>array('create','update','admin','absence','record'),
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
		$attendant = ConferenceAttendance::model()->findAllByAttributes(array('conference_id'=>$id,'attendance_status'=>1));
		$absence = ConferenceAttendance::model()->findAllByAttributes(array('conference_id'=>$id,'attendance_status'=>0));

		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'attendant'=>$attendant,
			'absence'=>$absence
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Conference;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Conference']))
		{
			$model->attributes=$_POST['Conference'];
			$model->end_time = $model->start_time;
			$model->create_time = date('Y-m-d H:i:s');
			if($model->save()){
				if($model->type == 0){
					$users = array(3,4,5,6,7,8,9,26,27,32,34,35,36,42);
					foreach ($users as $key => $u) {
							$attendance = new ConferenceAttendance;
							$attendance->conference_id = $model->id;
							$attendance->user_id = $u;
							$attendance->attendance_status = 1;
							$attendance->save();
					}
				}
				$this->redirect(array('admin'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
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

		$attendant = ConferenceAttendance::model()->findAllByAttributes(array('conference_id'=>$id,'attendance_status'=>1));
		$absence = ConferenceAttendance::model()->findAllByAttributes(array('conference_id'=>$id,'attendance_status'=>0));

		if(isset($_POST['Conference']))
		{
			$model->attributes=$_POST['Conference'];
			if($model->save()){
				$cids = $_POST['ConferenceAttendance'];
				foreach ($cids as $key => $v) {
					$cmodel = ConferenceAttendance::model()->findByPk($key);
					$cmodel->attendance_status = $v;
					$cmodel->save();
				}
				$this->redirect(array('admin'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionRecord($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$attendant = ConferenceAttendance::model()->findAllByAttributes(array('conference_id'=>$id,'attendance_status'=>1));
		$absence = ConferenceAttendance::model()->findAllByAttributes(array('conference_id'=>$id,'attendance_status'=>0));

		if(isset($_POST['Conference']))
		{
			$model->attributes=$_POST['Conference'];
			if($model->save()){
				$cids = $_POST['ConferenceAttendance'];
				foreach ($cids as $key => $v) {
					$cmodel = ConferenceAttendance::model()->findByPk($key);
					$cmodel->attendance_status = $v;
					$cmodel->save();
				}
				$this->redirect(array('admin'));
			}
		}

		$this->render('record',array(
			'model'=>$model,
			'attendant'=>$attendant,
			'absence'=>$absence
		));
	}

	public function actionAbsence($id)
	{
		$model=$this->loadModel($id);
		$absence_model = ConferenceAttendance::model()->findByAttributes(array('conference_id'=>$id,'user_id'=>Yii::app()->user->id));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ConferenceAttendance']))
		{
			$absence_model->reason=$_POST['ConferenceAttendance']['reason'];
			$absence_model->attendance_status = 0;

			if($absence_model->save())
				$this->redirect(array('index'));
		}

		$this->render('absence',array(
			'model'=>$model,
			'absence_model'=>$absence_model
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
			ConferenceAttendance::model()->delteAll(array('conference_id'=>$id));

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
		$this->redirect('admin');
		$date = date('Y-m-d');
		if(isset($_GET['archive'])){
			$model = ConferenceAttendance::model()->findAll(array(
				'select' =>array('start_time','id','type'),
	  		'order' => 'id DESC',
				'condition' => 'start_time < :date',
				'params' => array(':date'=>$date),
			));
			$archive = true;
		}else{
			$model = Conference::model()->findAll(array(
				'select' =>array('start_time','id','type'),
	  		'order' => 'id DESC',
				'condition' => 'start_time >= :date',
				'params' => array(':date'=>$date),
			));
			$archive = false;
		}
		$this->render('index',array(
			'model'=>$model,
			'archive'=>$archive
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = Conference::model()->findAll(array(
  		'order' => 'id DESC',
		));

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
		$model=Conference::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='conference-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
