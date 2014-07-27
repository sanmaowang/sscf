<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'childcase-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); ?>
<legend>患儿基本信息</legend>
	<p class="help-block">带<span class="required">*</span> 是必填项目.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'nickname',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->fileFieldRow($model, 'avatar'); ?>

	<?php echo $form->textFieldRow($model,'birthday',array('class'=>'span5')); ?>

	<?php echo $form->radioButtonListRow($model, 'gender', array('0'=>"男", '1'=>"女")); ?>

	<?php echo $form->textFieldRow($model,'home',array('class'=>'span5','maxlength'=>80)); ?>

	<?php echo $form->textFieldRow($model,'height',array('class'=>'span5','maxlength'=>6)); ?>

	<?php echo $form->textFieldRow($model,'weight',array('class'=>'span5','maxlength'=>6)); ?>

	<?php echo $form->textFieldRow($model,'id_card',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'address',array('class'=>'span5','maxlength'=>160)); ?>

	<?php echo $form->textFieldRow($model,'nation',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'citivaltype',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'contact',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'telephone',array('class'=>'span5','maxlength'=>25)); ?>
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
