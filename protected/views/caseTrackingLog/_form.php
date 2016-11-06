<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'case-tracking-log-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">带<span class="required">*</span> 是必填项目.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'tracking_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'step',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'log_content',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
