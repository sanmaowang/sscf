<?php
$this->breadcrumbs=array(
	'Conference Attendances'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ConferenceAttendance','url'=>array('index')),
	array('label'=>'Create ConferenceAttendance','url'=>array('create')),
	array('label'=>'Update ConferenceAttendance','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete ConferenceAttendance','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConferenceAttendance','url'=>array('admin')),
);
?>

<h1>View ConferenceAttendance #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'conference_id',
		'user_id',
		'reason',
		'attendace_status',
	),
)); ?>
