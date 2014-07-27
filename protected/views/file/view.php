<?php
$this->breadcrumbs=array(
	'Files'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Operation'),
  array('label'=>'My File', 'icon'=>'file', 'url'=>array('index')),
  array('label'=>'List File', 'icon'=>'list', 'url'=>array('list'),'visible'=>Yii::app()->user->isAdmin()),
  array('label'=>'Create File', 'icon'=>'plus', 'url'=>array('create'),'visible'=>Yii::app()->user->isAdmin()),
  array('label'=>'Manage File', 'icon'=>'pencil', 'url'=>array('admin'),'visible'=>Yii::app()->user->isAdmin()),
);
?>

<h1>File #<?php echo $model->name; ?></h1>
<h3>Basic Info</h3>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'path',
		'description',
		'create_time',
		'update_time',
	),
)); ?>
<h3>Owners:</h3>
<ul>
<?php foreach($model->user as $user): ?>
	<li><a href="<?php echo $this->createUrl('user/view',array('id'=>$user->id))?>"><?php echo $user->username;?></a></li>
<?php endforeach;?>
</ul>
	

<div class="btn-toolbar text-right">
  <?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Hand',
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', // null, 'large', 'small' or 'mini'
    'url'=>$this->createUrl('file/hand',array('id'=>$model->id))
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Edit',
    'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', // null, 'large', 'small' or 'mini'
    'url'=>$this->createUrl('file/update',array('id'=>$model->id))
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Download',
    'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', // null, 'large', 'small' or 'mini'
    'url'=>$this->createUrl('file/download',array('id'=>$model->id))
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit', 
    'label'=>'Delete',
    'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', // null, 'large', 'small' or 'mini'
		'htmlOptions'=>array('submit'=>array('delete','id'=>$model->id),
		'confirm'=>'Are you sure you want to delete this item?')
	)); ?>
</div>