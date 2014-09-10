<?php
$this->breadcrumbs=array(
	'Donors'=>array('index'),
	$model->name,
);

$this->menu=array(
  array('label'=>'Operation'),
  array('label'=>'Donors','icon'=>'user', 'url'=>array('donor/index'),'active'=>true),
  array('label'=>'Receipts','icon'=>'file', 'url'=>array('receipt/list')),
);
?>
<div class="page-header">
<h1>View Donor #<?php echo $model->name; ?></h1>
</div>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'name',
		'id_card',
		'gender',
		'birthday',
		'company',
		'job',
		'department',
		'email',
		'mobile',
		'create_time',
		'update_time',
	),
)); ?>
