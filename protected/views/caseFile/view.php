<?php
$this->breadcrumbs=array(
	'Case Files'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List CaseFile','url'=>array('index')),
	array('label'=>'Create CaseFile','url'=>array('create')),
	array('label'=>'Update CaseFile','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete CaseFile','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CaseFile','url'=>array('admin')),
);
?>

<h1>View CaseFile #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'case_id',
		'key',
		'path',
		'title',
		'desc',
		'create_time',
		'update_time',
	),
)); ?>
