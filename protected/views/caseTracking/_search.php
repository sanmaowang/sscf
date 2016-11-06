<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'case_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'step1',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'step2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'step3',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'step4',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'step5',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'step6',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'step7',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'step8',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'step9',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'step10',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'step11',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
