<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Operation'),
  array('label'=>'List User', 'icon'=>'list', 'url'=>array('index')),
  array('label'=>'Create User', 'icon'=>'plus', 'url'=>array('create')),
  array('label'=>'Manage User', 'icon'=>'pencil', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->username; ?></h1>
<div class="btn-toolbar">
<?php $this->widget('bootstrap.widgets.TbButton', array(
  'label'=>'Update',
  'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
  'size'=>'mini', // null, 'large', 'small' or 'mini'
  'url'=>array('update','id'=>$model->id),
)); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit', 
    'label'=>'Delete',
    'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'mini', // null, 'large', 'small' or 'mini'
		'htmlOptions'=>array('submit'=>array('delete','id'=>$model->id),
		'confirm'=>'Are you sure you want to delete this item?')
	)); ?>
</div>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'email',
		'password',
		'name',
		'id_card',
		'gender',
		'birthday',
		'marital_status',
		'job_number',
		'residence',
		'department',
		'mobile',
		'nickname',
		'avatar',
		'create_time',
		'update_time',
		'login_count',
		'role',
		'is_deleted',
	),
)); ?>
