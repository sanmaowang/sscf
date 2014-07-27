<?php
$this->breadcrumbs=array(
	'Files'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Operation'),
  array('label'=>'My File', 'icon'=>'file', 'url'=>array('index')),
  array('label'=>'List File', 'icon'=>'list', 'url'=>array('list'),'visible'=>Yii::app()->user->isAdmin()),
  array('label'=>'Create File', 'icon'=>'plus', 'url'=>array('create'),'active'=>true,'visible'=>Yii::app()->user->isAdmin()),
  array('label'=>'Manage File', 'icon'=>'pencil', 'url'=>array('admin'),'visible'=>Yii::app()->user->isAdmin()),
);
?>

<h1>Create File</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>