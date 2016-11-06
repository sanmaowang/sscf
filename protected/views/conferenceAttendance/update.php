<?php
$this->breadcrumbs=array(
	'Conference Attendances'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ConferenceAttendance','url'=>array('index')),
	array('label'=>'Create ConferenceAttendance','url'=>array('create')),
	array('label'=>'View ConferenceAttendance','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ConferenceAttendance','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>Update ConferenceAttendance <?php echo $model->id; ?></h1>
</div>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>