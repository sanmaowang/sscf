<?php
$this->breadcrumbs=array(
	'Case Tracking Logs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CaseTrackingLog','url'=>array('index')),
	array('label'=>'Manage CaseTrackingLog','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>Create CaseTrackingLog</h1>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>