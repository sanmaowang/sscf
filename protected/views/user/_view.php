
<div class="view" style="margin:10px 0 0;">
	<div class="row-fluid">
	<div class="pull-left">
	<p>
		<?php $data->avatar = empty($data->avatar)?"noavatar.jpg":$data->avatar?>
    <a href="<?php echo $this->createUrl('user/view',array('id'=>$data->id))?>"><?php echo CHtml::image(Yii::app()->request->baseUrl.'/uploads/avatar/'.$data->avatar,"avatar",array("width"=>60)); ?></a>
	</p>
	</div>
	<div class="pull-left" style="margin-left:10px">
	<p><b><?php echo CHtml::encode($data->username); ?></b></p>
	<p><b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<span class="label"><?php echo CHtml::encode($data->job); ?></span>
	</p>
	</div>
	</div>
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('job_number')); ?>:</b>
	<?php echo CHtml::encode($data->job_number); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('department')); ?>:</b>
	<?php echo CHtml::encode($data->department); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobile')); ?>:</b>
	<?php echo CHtml::encode($data->mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nickname')); ?>:</b>
	<?php echo CHtml::encode($data->nickname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('avatar')); ?>:</b>
	<?php echo CHtml::encode($data->avatar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('login_count')); ?>:</b>
	<?php echo CHtml::encode($data->login_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('role')); ?>:</b>
	<?php echo CHtml::encode($data->role); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_deleted')); ?>:</b>
	<?php echo CHtml::encode($data->is_deleted); ?>
	<br />

	*/ ?>
</div>
<hr>