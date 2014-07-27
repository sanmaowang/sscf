<?php
/* @var $this ChildController */
/* @var $model Child */

$this->breadcrumbs=array(
	'Children'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Child', 'url'=>array('index')),
	array('label'=>'Create Child', 'url'=>array('create')),
	array('label'=>'Update Child', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Child', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Child', 'url'=>array('admin')),
);
?>

<div class="page-header">
<h2>查看 Child #<?php echo $model->id; ?></h2>
</div>
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'nickname',
		'avatar',
		'birthday',
		'gender',
		'home',
		'height',
		'weight',
		'id_card',
		'address',
		'nation',
		'citivaltype',
		'contact',
		'telephone',
		'create_time',
		'update_time',
	),
)); ?>
