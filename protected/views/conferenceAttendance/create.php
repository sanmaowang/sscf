<?php
$this->breadcrumbs=array(
	'Conference Attendances'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConferenceAttendance','url'=>array('index')),
	array('label'=>'Manage ConferenceAttendance','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>Create ConferenceAttendance</h1>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>