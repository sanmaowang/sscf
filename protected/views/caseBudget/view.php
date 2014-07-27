<?php
$this->breadcrumbs=array(
	'Case Budgets'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CaseBudget','url'=>array('index')),
	array('label'=>'Create CaseBudget','url'=>array('create')),
	array('label'=>'Update CaseBudget','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete CaseBudget','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CaseBudget','url'=>array('admin')),
);
?>

<h1>View CaseBudget #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'amount',
		'source',
		'note',
	),
)); ?>
