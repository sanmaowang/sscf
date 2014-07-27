<?php
/* @var $this ChildController */
/* @var $model Child */
/* @var $form CActiveForm */
?>

<div class="form form-horizontal">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'child-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>

	<p class="note"><span class="required">*</span> 是必填项目.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<?php echo $form->labelEx($model,'name',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'name',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'nickname',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'nickname',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'nickname'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'avatar',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->fileFieldRow($model, 'avatar'); ?>
		<?php echo $form->error($model,'avatar'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'birthday',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'birthday'); ?>
		<?php echo $form->error($model,'birthday'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'gender',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'gender'); ?>
		<?php echo $form->error($model,'gender'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'home',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'home',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'home'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'height',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'height',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'height'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'weight',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'weight',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'weight'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_card',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'id_card',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'id_card'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'address',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>160)); ?>
		<?php echo $form->error($model,'address'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'nation',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'nation',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'nation'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'citivaltype',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'citivaltype',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'citivaltype'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'contact',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'contact',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'contact'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'telephone',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'telephone',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'telephone'); ?>
		</div>
	</div>

	<div class="control-group">
		<div class="form-actions buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存',array('class'=>'btn btn-primary')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->