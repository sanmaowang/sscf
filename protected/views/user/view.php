<?php
$this->breadcrumbs=array(
	'海星团队'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Operation'),
  array('label'=>'List User', 'icon'=>'list', 'url'=>array('index')),
  array('label'=>'Create User', 'icon'=>'plus', 'url'=>array('create')),
  array('label'=>'Manage User', 'icon'=>'pencil', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->username; ?></h1>
<h3>Account</h3>
  <div class="row-fluid">
  	<div class="span2">
  		<?php $model->avatar = empty($model->avatar)?"noavatar.jpg":$model->avatar?>
	    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/uploads/avatar/'.$model->avatar,"avatar",array("width"=>120)); ?>
  	</div>
  	<div class="span9">
  		<table class="table">
				<tr>
					<th width="30%"><?php echo CHtml::encode($model->getAttributeLabel('username')); ?></th>
					<td><?php echo CHtml::encode($model->username); ?></td>
				</tr>
				<tr>
					<th><?php echo CHtml::encode($model->getAttributeLabel('email')); ?></th>
					<td><?php echo CHtml::encode($model->email); ?></td>
				</tr>
				<tr>
					<th><?php echo CHtml::encode($model->getAttributeLabel('job')); ?></th>
					<td><?php echo CHtml::encode($model->job); ?></td>
				</tr>
				<tr>
					<th><?php echo CHtml::encode($model->getAttributeLabel('is_active')); ?></th>
					<td><?php echo CHtml::encode($model->is_active); ?></td>
				</tr>
			</table>
  	</div>
  </div>
	<h3>Personal</h3>
	<table class="table table-striped">
		<tr>
			<th width="30%"><?php echo CHtml::encode($model->getAttributeLabel('name')); ?></th>
			<td><?php echo CHtml::encode($model->name); ?></td>
		</tr>

		<tr>
			<th><?php echo CHtml::encode($model->getAttributeLabel('birthday')); ?></th>
			<td><?php echo CHtml::encode($model->birthday); ?></td>
		</tr>
		<tr>
			<th><?php echo CHtml::encode($model->getAttributeLabel('mobile')); ?></th>
			<td><?php echo CHtml::encode($model->mobile); ?></td>
		</tr>
		<tr>
			<th><?php echo CHtml::encode($model->getAttributeLabel('residence')); ?></th>
			<td><?php echo CHtml::encode($model->residence); ?></td>
		</tr>
	</table>
