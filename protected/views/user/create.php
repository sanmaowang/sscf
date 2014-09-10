<?php
$this->breadcrumbs=array(
	'海星团队'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Operation'),
  array('label'=>'List User', 'icon'=>'list', 'url'=>array('index')),
  array('label'=>'Create User', 'icon'=>'plus', 'url'=>array('create'),'active'=>true),
  array('label'=>'Manage User', 'icon'=>'pencil', 'url'=>array('admin')),
);
?>

<h1>Create User</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>