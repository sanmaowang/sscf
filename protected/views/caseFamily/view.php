<?php
$this->breadcrumbs=array(
	'Case Families'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CaseFamily','url'=>array('index')),
	array('label'=>'Create CaseFamily','url'=>array('create')),
	array('label'=>'Update CaseFamily','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete CaseFamily','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CaseFamily','url'=>array('admin')),
);
?>

<h1>View CaseFamily #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'case_id',
		'relationship',
		'is_immediate',
		'age',
		'id_card',
		'education',
		'nation',
		'health_state',
		'career',
		'annual_income',
		'economical_source_desc',
		'special_desc',
		'note',
		'create_time',
		'update_time',
	),
)); ?>
