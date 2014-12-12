<?php
Yii::import("application.extensions.Pinyin");
class CaseFileController extends Controller
{
	public $code = "CaseFile";
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
				'actions'=>array('create','update','delete','updatetag','multicreate'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
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

	private function toEnglish($s)
	{
		if(preg_match("/^[\x7f-\xff]+$/",$s)){
			$obj_py = new Pinyin();
			$fn = substr($s,0,3);
			$n = substr($s,3);
			$name = ucfirst($obj_py->getPinYin($fn))." ".ucfirst($obj_py->getPinYin($n));
			return $name;
		}else{
			return $s;
		}
 
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new CaseFile("create");

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);


		if(isset($_POST['CaseFile']))
		{

			$model->attributes=$_POST['CaseFile'];
      $file=CUploadedFile::getInstance($model,'path');

      if(!empty($file))
      {
      	$folder_type = array("under review","under review","under review","funded","passed");
        $path = Yii::getPathOfAlias('webroot').DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'case'.DIRECTORY_SEPARATOR.$folder_type[$model->case->status].DIRECTORY_SEPARATOR;

      	$case_name = $this->toEnglish($model->case->name);
        $file_path = $model->case_id.'_'.$case_name.DIRECTORY_SEPARATOR.$model->getFolder().DIRECTORY_SEPARATOR.$model->title.'.'.$file->extensionName;
        $model->path = $file_path;
        
        // if (!file_exists($path.$model->case_id.'_'.$case_name.DIRECTORY_SEPARATOR.$model->getFolder().DIRECTORY_SEPARATOR)) {
        //   FileUtil::createDir($path.$model->case_id.'_'.$case_name.DIRECTORY_SEPARATOR.$model->getFolder().DIRECTORY_SEPARATOR);
        // }

        // $file->saveAs(Yii::app()->basePath.'/../uploads/case/'.DIRECTORY_SEPARATOR.$folder_type[$model->case->status].DIRECTORY_SEPARATOR.$file_path);
				
      	$upyun_path = DIRECTORY_SEPARATOR.'case'.DIRECTORY_SEPARATOR.$folder_type[$model->case->status].DIRECTORY_SEPARATOR;
      	$result = Yii::app()->upyun->saveImg($file->tempName,$upyun_path.$file_path);

      }

			if(count($result) > 0 && $model->save()){
				if(isset($_POST['CaseFamily']['return'])){
					$this->redirect(array('/childcase/update','id'=>$model->case_id,'flag'=>$_POST['CaseFamily']['return']));
				}else{
					$this->redirect(array('view','id'=>$model->id));
				}
			}else{
				$this->redirect(array('/childcase/update','id'=>$model->case_id,'flag'=>$_POST['CaseFamily']['return']));
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
	public function actionUpdate($id,$flag)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['CaseFile']))
		{

			$file=CUploadedFile::getInstance($model,'path');

      if(!empty($file))
      {
      	$folder_type = array("under review","under review","under review","funded","passed");
        $path = Yii::getPathOfAlias('webroot').DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'case'.DIRECTORY_SEPARATOR.$folder_type[$model->case->status].DIRECTORY_SEPARATOR;

      	$case_name = $this->toEnglish($model->case->name);
        $file_path = $model->case_id.'_'.$case_name.DIRECTORY_SEPARATOR.$model->getFolder().DIRECTORY_SEPARATOR.$model->title.'.'.$file->extensionName;
        $model->path = $file_path;
        
        // if (!file_exists($path.$model->case_id.'_'.$case_name.DIRECTORY_SEPARATOR.$model->getFolder().DIRECTORY_SEPARATOR)) {
        //   FileUtil::createDir($path.$model->case_id.'_'.$case_name.DIRECTORY_SEPARATOR.$model->getFolder().DIRECTORY_SEPARATOR);
        // }

        // $file->saveAs(Yii::app()->basePath.'/../uploads/case/'.DIRECTORY_SEPARATOR.$folder_type[$model->case->status].DIRECTORY_SEPARATOR.$file_path);
        
        $upyun_path = DIRECTORY_SEPARATOR.'case'.DIRECTORY_SEPARATOR.$folder_type[$model->case->status].DIRECTORY_SEPARATOR;
      	$result = Yii::app()->upyun->saveImg($file->tempName,$upyun_path.$file_path);

      }else{
      	$_POST['CaseFile']['path'] = $model->path;
      }
			$model->attributes=$_POST['CaseFile'];

			if(count($result) > 0  && $model->save()){
				if(isset($_POST['CaseFamily']['return'])){
					$this->redirect(array('/childcase/update','id'=>$model->case_id,'flag'=>$_POST['CaseFamily']['return']));
				}else{
					$this->redirect(array('view','id'=>$model->id));
				}
			}
			
		}

		$this->render('update',array(
			'model'=>$model,
			'flag'=>$flag
		));
	}

	public function actionUpdateTag()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
		  $id =  (int)Yii::app()->request->getParam('id');
		  $key = Yii::app()->request->getParam('key');
			$model = $this->loadModel($id);
			if($key){
				$model->key = $key;
				$model->title = FileArray::getLabel($key);
				$model->save();
			}
		  echo CJSON::encode(array("id"=>$id));
		}
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


	// public function actionMultiCreate($id)
 //  {
 //    $this->layout = '//layouts/json';
 //    $file = $_FILES['Filedata'];

 //    $folder_type = array("under review","under review","under review","funded","passed");

 //    if(is_uploaded_file($file['tmp_name'])){
      
 //      $extension = Utils::fileExt($file['name']);
 //      $model = new CaseFile;
 //      $model->case_id = $id;
 //      $model->key = $flag;
      
	// 		$case_name = $this->toEnglish($model->case->name);
 //  		$file_path = $model->case_id.'_'.$case_name.DIRECTORY_SEPARATOR.$model->getFolder().DIRECTORY_SEPARATOR.$file['name'].'.'.$extension;
 //  		$path = Yii::getPathOfAlias('webroot').DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'case'.DIRECTORY_SEPARATOR.$folder_type[$model->case->status].DIRECTORY_SEPARATOR;

 //      if(move_uploaded_file(($file['tmp_name']),$path.$file_path)){

	//       $model->name = $file['name'];
 //        $model->path = $file_path;
 //        $model->update_time= $model->create_time= date('Y-m-d H:i:s');

 //        if($model->save()){
 //          echo "FILEID:".Yii::app()->getBaseUrl().'/uploads/case/'.$folder_type[$model->case->status].$file_path;
 //        }
	//     }
 //    }
 //  }

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('CaseFile');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CaseFile('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CaseFile']))
			$model->attributes=$_GET['CaseFile'];

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
		$model=CaseFile::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='case-file-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
