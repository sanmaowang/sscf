<?php
$this->breadcrumbs=array(
	'票据'=>array('list'),
	$model->name,
);

$this->menu=array(
  array('label'=>'Operation'),
  array('label'=>'Donors','icon'=>'user', 'url'=>array('donor/index')),
  array('label'=>'Receipts','icon'=>'file', 'url'=>array('receipt/list'),'active'=>true),
);
?>

<h1>Receipt #<?php echo $model->name; ?></h1>
<h3>Basic Info</h3>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'description',
		'create_time',
		'update_time',
	),
)); ?>
<h3>Owners:</h3>
<ul>
<?php foreach($model->donor as $user): ?>
	<li><a href="<?php echo $this->createUrl('user/view',array('id'=>$user->id))?>"><?php echo $user->username;?></a></li>
<?php endforeach;?>
</ul>
	

<div class="btn-toolbar text-right">
  <?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Hand',
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', // null, 'large', 'small' or 'mini'
    'url'=>$this->createUrl('receipt/hand',array('id'=>$model->id))
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Edit',
    'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', // null, 'large', 'small' or 'mini'
    'url'=>$this->createUrl('receipt/update',array('id'=>$model->id))
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Download',
    'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', // null, 'large', 'small' or 'mini'
    'url'=>$this->createUrl('receipt/download',array('id'=>$model->id))
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit', 
    'label'=>'Delete',
    'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', // null, 'large', 'small' or 'mini'
		'htmlOptions'=>array('submit'=>array('receipt/delete','id'=>$model->id),
		'confirm'=>'Are you sure you want to delete this item?')
	)); ?>
</div>