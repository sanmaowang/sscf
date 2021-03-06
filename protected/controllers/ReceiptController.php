<?php

class ReceiptController extends Controller
{
	public $code = "Donor";
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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','create','admin','update','delete','view','hand','list','createReceipt'),
				'users'=>array('@'),
			),
			array('allow',
				'actions'=>array('download'),
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

	public function actionDownload($id)
	{
		$model = $this->loadModel($id);
		$file = Yii::getPathOfAlias('webroot').'/uploads/receipt/'.$model->path;
		
		$user = $model->donor;
		$owners = array();

		foreach($user as $u) {
			array_push($owners,(int)$u->id);
		}

		if(in_array(Yii::app()->user->id,$owners) || Yii::app()->user->isAdmin()){
			if(!file_exists($file)){
				header("Content-type: text/html; charset = utf-8");
				echo "文件不存在";
				exit;
			}else{
				$realfile = fopen($file,"r");
				$fsize = filesize($file);
				header("Content-type: application/octet-stream");
				header("Accept-Ranges: bytes");
				header("Accept-Length: ".$fsize);
				header("Content-Disposition: attachment; filename =".$model->path."");
				echo fread($realfile , $fsize);
				fclose($realfile);
			}
		}else{
			header("Content-type: text/html; charset = utf-8");
			echo "您没有权限下载";
			exit;
		}
	}

	public function actionCreateReceipt()
  {
    $this->layout = '//layouts/json';
    $file = $_FILES['Filedata'];
    $path = Yii::getPathOfAlias('webroot').'/uploads/receipt/';

    if(is_uploaded_file($file['tmp_name'])){
      
      $extension = Utils::fileExt($file['name']);
      $file_name = 'receipt_'.time().$extension;

      if(move_uploaded_file(($file['tmp_name']),$path.$file_name)){
	      $model = new Receipt;
	      $model->name = $file['name'];
        $model->path = $file_name;
        $model->update_time= $model->create_time= date('Y-m-d H:i:s');
        if($model->save()){
          echo "FILEID:".Yii::app()->getBaseUrl().'/uploads/receipt/'.$file_name;
        }
	    }
    }
  }

	public function actionHand($id)
	{
		$file = $this->loadModel($id);
		$user = $file->donor;

		$users = Donor::model()->findAll();
		$owners = array();

		foreach($user as $u) {
			array_push($owners,$u->id);
		}

		$model=new DonorReceipt;
		$flag = false;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['DonorReceipt']))
		{	
			$criteria=new CDbCriteria;  
			$criteria->addCondition("receipt_id = ($file->id)");  
			DonorReceipt::model()->deleteAll($criteria);  
			foreach ($_POST['DonorReceipt']['donor_id'] as $user_id) {
				$userfile_model = new DonorReceipt;
				$userfile_model->donor_id = $user_id;
				$userfile_model->receipt_id = $file->id;
	      if(!$userfile_model->validate())
				{
					Yii::app()->user->setFlash('error',$userfile_model->getErrors());
					$this->redirect(array('create'));
					$flag = false;
					break;
				}else{
					if($userfile_model->validate() && $userfile_model->save()){
						$flag = true;
					}
				}
			}
			if($flag){
				Yii::app()->user->setFlash('success','Great, change information successed!');
				$this->redirect(array('view','id'=>$file->id));
			}
		}
		$this->render('hand',array(
			'model'=>$model,
			'file'=>$file,
			'owners'=>$owners,
			'users'=>$users
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Receipt;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Receipt']))
		{
			if(empty($_POST['Receipt']['path'])){
        $_POST['Receipt']['path'] = $model->path;
      }

			$model->attributes=$_POST['Receipt'];
			$model->create_time = $model->update_time = date('Y-m-d H:i:s');
      $file=CUploadedFile::getInstance($model,'path');

      if(!empty($file))
      {
        $fileName = 'receipt_'.time().'.'.$file->extensionName;
        $model->path = $fileName;
        
        $filePath = Yii::getPathOfAlias('webroot').'/uploads/receipt/';
        if (!file_exists($filePath)) {
          Utils::recur_mkdirs($filePath);
        }

        $file->saveAs(Yii::app()->basePath.'/../uploads/receipt/'.$model->path);
      }

      if(!$model->validate())
			{
				Yii::app()->user->setFlash('error',$model->getErrors());
				$this->redirect(array('create'));
			}
			if($model->validate() && $model->save()){
				Yii::app()->user->setFlash('success','Great, change information successed!');
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Receipt']))
		{
			if(empty($_POST['Receipt']['path'])){
        $_POST['Receipt']['path'] = $model->path;
      }

			$model->attributes=$_POST['Receipt'];
			$model->create_time = $model->update_time = date('Y-m-d H:i:s');
      $file=CUploadedFile::getInstance($model,'path');

      if(!empty($file))
      {
        $fileName = 'receipt_'.time().'.'.$file->extensionName;
        $model->path = $fileName;
        
        $filePath = Yii::getPathOfAlias('webroot').'/uploads/receipt/';
        if (!file_exists($filePath)) {
          Utils::recur_mkdirs($filePath);
        }

        $file->saveAs(Yii::app()->basePath.'/../uploads/receipt/'.$model->path);
      }

      if(!$model->validate())
			{
				Yii::app()->user->setFlash('error',$model->getErrors());
				$this->redirect(array('update','id'=>$model->id));
			}
			if($model->validate() && $model->save()){
				Yii::app()->user->setFlash('success','Great, change information successed!');
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
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
		$criteria = new CDbCriteria;
    $criteria->with = 'donor';
    $criteria->join = "JOIN tb_donor_receipt on t.id=tb_donor_receipt.receipt_id";  
    $criteria->condition = 'tb_donor_receipt.donor_id=:user_id';
    $criteria->params = array(':user_id'=>Yii::app()->user->id);
    $criteria->order = 't.id asc';

    $item_count = Receipt::model()->count($criteria);

		$pages = new CPagination($item_count);
		$pages->setPageSize(10);
		$pages->applyLimit($criteria); 

		$this->render('index',array(
		  'model'=> Receipt::model()->findAll($criteria),
		        'item_count'=>$item_count,
		        'page_size'=>10,
		        'items_count'=>$item_count,
		        'pages'=>$pages,
		));
	}

	public function actionList()
	{
		$criteria = new CDbCriteria;
    $criteria->with = 'donor';
    $criteria->order = 't.id asc';

    $item_count = Receipt::model()->count();

		$pages = new CPagination($item_count);
		$pages->setPageSize(10);
		$pages->applyLimit($criteria);
		$model = Receipt::model()->with('donor')->findAll($criteria);
		$this->render('list',array(
		  'model'=>$model,
		        'item_count'=>$item_count,
		        'page_size'=>10,
		        'items_count'=>$item_count,
		        'pages'=>$pages,
		));
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Receipt('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['File']))
			$model->attributes=$_GET['File'];

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
		$model=Receipt::model()->with('donor')->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='receipt-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
