<?php
$this->breadcrumbs=array(
	'Orgs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List OtherOrg','url'=>array('index')),
	array('label'=>'Create OtherOrg','url'=>array('create')),
	array('label'=>'Update OtherOrg','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete OtherOrg','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OtherOrg','url'=>array('admin')),
);
?>

<h1>View OtherOrg #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'parent_id',
		'name',
		'contact',
		'type',
		'create_time',
		'update_time',
	),
)); ?>
