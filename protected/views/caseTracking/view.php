<?php
$this->breadcrumbs=array(
	'Case Trackings'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CaseTracking','url'=>array('index')),
	array('label'=>'Create CaseTracking','url'=>array('create')),
	array('label'=>'Update CaseTracking','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete CaseTracking','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CaseTracking','url'=>array('admin')),
);
?>

<h1>View CaseTracking #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'case_id',
		'step1',
		'step2',
		'step3',
		'step4',
		'step5',
		'step6',
		'step7',
		'step8',
		'step9',
		'step10',
		'step11',
	),
)); ?>
