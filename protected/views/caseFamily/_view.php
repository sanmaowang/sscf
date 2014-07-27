<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('case_id')); ?>:</b>
	<?php echo CHtml::encode($data->case_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relationship')); ?>:</b>
	<?php echo CHtml::encode($data->relationship); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_immediate')); ?>:</b>
	<?php echo CHtml::encode($data->is_immediate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('age')); ?>:</b>
	<?php echo CHtml::encode($data->age); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_card')); ?>:</b>
	<?php echo CHtml::encode($data->id_card); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('education')); ?>:</b>
	<?php echo CHtml::encode($data->education); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('nation')); ?>:</b>
	<?php echo CHtml::encode($data->nation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('health_state')); ?>:</b>
	<?php echo CHtml::encode($data->health_state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('career')); ?>:</b>
	<?php echo CHtml::encode($data->career); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('annual_income')); ?>:</b>
	<?php echo CHtml::encode($data->annual_income); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('economical_source_desc')); ?>:</b>
	<?php echo CHtml::encode($data->economical_source_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('special_desc')); ?>:</b>
	<?php echo CHtml::encode($data->special_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	*/ ?>

</div>