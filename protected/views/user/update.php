<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Operation'),
  array('label'=>'List User', 'icon'=>'list', 'url'=>array('index')),
  array('label'=>'Create User', 'icon'=>'plus', 'url'=>array('create')),
  array('label'=>'Manage User', 'icon'=>'pencil', 'url'=>array('admin')),
);
?>

<h1>Update User #<?php echo $model->username; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>