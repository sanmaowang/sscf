<?php
$this->breadcrumbs=array(
	'Member Center',
);


$this->menu=array(
	array('label'=>'Operation'),
	array('label'=>'Member Center','icon'=>'user', 'url'=>array('index'),'active'=>true),
	array('label'=>'Personal Settings','icon'=>'edit', 'url'=>array('update')),
	array('label'=>'Security Settings','icon'=>'lock', 'url'=>array('password')),
);
?>

<h1>Member Center</h1>
  <h3>Account</h3>
  <div class="row-fluid">
  	<div class="span2">
  		<?php $data->avatar = empty($data->avatar)?"noavatar.jpg":$data->avatar?>
	    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/uploads/avatar/'.$data->avatar,"avatar",array("width"=>120)); ?>
  	</div>
  	<div class="span9">
  		<table class="table">
				<tr>
					<th width="30%"><?php echo CHtml::encode($data->getAttributeLabel('username')); ?></th>
					<td><?php echo CHtml::encode($data->username); ?></td>
				</tr>
				<tr>
					<th><?php echo CHtml::encode($data->getAttributeLabel('email')); ?></th>
					<td><?php echo CHtml::encode($data->email); ?></td>
				</tr>
			</table>
  	</div>
  </div>
  <hr>
	<h3>Personal</h3>
	<table class="table table-striped">
		<tr>
			<th width="30%"><?php echo CHtml::encode($data->getAttributeLabel('name')); ?></th>
			<td><?php echo CHtml::encode($data->name); ?></td>
		</tr>
		<tr>
			<th><?php echo CHtml::encode($data->getAttributeLabel('nickname')); ?></th>
			<td><?php echo CHtml::encode($data->nickname); ?></td>
		</tr>
		<tr>
			<th><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?></th>
			<td><?php if($data->gender == 0){echo "Male";}else{ echo "Female";};?></td>
		</tr>
		<tr>
			<th><?php echo CHtml::encode($data->getAttributeLabel('birthday')); ?></th>
			<td><?php echo CHtml::encode($data->birthday); ?></td>
		</tr>
		<tr>
			<th><?php echo CHtml::encode($data->getAttributeLabel('mobile')); ?></th>
			<td><?php echo CHtml::encode($data->mobile); ?></td>
		</tr>
	</table>
