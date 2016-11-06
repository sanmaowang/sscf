<?php
$this->breadcrumbs=array(
	'Conference Attendances',
);

$this->menu=array(
	array('label'=>'Create ConferenceAttendance','url'=>array('create')),
	array('label'=>'Manage ConferenceAttendance','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>Conference Attendances</h1>
</div>
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
