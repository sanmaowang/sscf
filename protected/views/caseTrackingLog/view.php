<?php
$this->breadcrumbs=array(
	'Case Tracking Logs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CaseTrackingLog','url'=>array('index')),
	array('label'=>'Create CaseTrackingLog','url'=>array('create')),
	array('label'=>'Update CaseTrackingLog','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete CaseTrackingLog','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CaseTrackingLog','url'=>array('admin')),
);
?>

<h1>View CaseTrackingLog #<?php echo $model->id; ?></h1>


