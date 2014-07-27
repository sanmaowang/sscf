<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('child_id')); ?>:</b>
	<?php echo CHtml::encode($data->child_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state_desc')); ?>:</b>
	<?php echo CHtml::encode($data->state_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('medical_insurance_rate')); ?>:</b>
	<?php echo CHtml::encode($data->medical_insurance_rate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('other_subsidy')); ?>:</b>
	<?php echo CHtml::encode($data->other_subsidy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('have_other_illness')); ?>:</b>
	<?php echo CHtml::encode($data->have_other_illness); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('have_pneumonia')); ?>:</b>
	<?php echo CHtml::encode($data->have_pneumonia); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('operation_hospital')); ?>:</b>
	<?php echo CHtml::encode($data->operation_hospital); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doctor')); ?>:</b>
	<?php echo CHtml::encode($data->doctor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_one_time_cure')); ?>:</b>
	<?php echo CHtml::encode($data->is_one_time_cure); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admission_time')); ?>:</b>
	<?php echo CHtml::encode($data->admission_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('operation_plan_time')); ?>:</b>
	<?php echo CHtml::encode($data->operation_plan_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('other_foundation_staff')); ?>:</b>
	<?php echo CHtml::encode($data->other_foundation_staff); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('staff')); ?>:</b>
	<?php echo CHtml::encode($data->staff); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('applicant')); ?>:</b>
	<?php echo CHtml::encode($data->applicant); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	*/ ?>

</div>