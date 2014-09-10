<?php
$this->breadcrumbs=array(
	'Receipts'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
  array('label'=>'Operation'),
  array('label'=>'Donors','icon'=>'user', 'url'=>array('donor/index')),
  array('label'=>'Receipts','icon'=>'file', 'url'=>array('receipt/list'),'active'=>true),
);
?>
<h1>Update Receipt #<?php echo $model->name; ?></h1>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>