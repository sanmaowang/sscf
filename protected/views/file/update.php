<?php
$this->breadcrumbs=array(
	'Files'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Operation'),
  array('label'=>'My File', 'icon'=>'list', 'url'=>array('index')),
  array('label'=>'Create File', 'icon'=>'plus', 'url'=>array('create')),
  array('label'=>'Manage File', 'icon'=>'pencil', 'url'=>array('admin')),
);
?>

<h1>Update File <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>