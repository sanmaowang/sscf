<?php
$this->breadcrumbs=array(
	'Case Tracking Logs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CaseTrackingLog','url'=>array('index')),
	array('label'=>'Create CaseTrackingLog','url'=>array('create')),
	array('label'=>'View CaseTrackingLog','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage CaseTrackingLog','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>Update CaseTrackingLog <?php echo $model->id; ?></h1>
</div>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>