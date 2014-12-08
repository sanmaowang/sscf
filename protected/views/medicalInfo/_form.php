<?php
/* @var $this MedicalInfoController */
/* @var $model MedicalInfo */
/* @var $form CActiveForm */
?>

<div class="form form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'medical-info-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> 是必填项目.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'file_id',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'file_id'); ?>
		<?php echo $form->error($model,'file_id'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'case_id',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'case_id'); ?>
		<?php echo $form->error($model,'case_id'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'title',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'title'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'content',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'create_datetime',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'create_datetime'); ?>
		<?php echo $form->error($model,'create_datetime'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'update_datetime',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'update_datetime'); ?>
		<?php echo $form->error($model,'update_datetime'); ?>
		</div>
	</div>

	<div class="control-group">
		<div class="form-actions buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存',array('class'=>'btn btn-primary')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->