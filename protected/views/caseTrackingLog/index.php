<?php
$this->breadcrumbs=array(
	'Case Tracking Logs',
);

$this->menu=array(
	array('label'=>'Create CaseTrackingLog','url'=>array('create')),
	array('label'=>'Manage CaseTrackingLog','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>Case Tracking Logs</h1>
</div>
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
