<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'other-org-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">带<span class="required">*</span> 是必填项目.</p>

	<?php echo $form->errorSummary($model); ?>

	<input type="hidden" value="<?php echo $model->parent_id == null?0:$model->parent_id;?>" name="Org[parent_id]"/>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>64)); ?>
	<?php echo $form->textFieldRow($model,'english_name',array('class'=>'span5','maxlength'=>64)); ?>
	<?php echo $form->textFieldRow($model,'official_name',array('class'=>'span5','maxlength'=>64)); ?>
	<?php echo $form->textFieldRow($model,'address',array('class'=>'span5','maxlength'=>255)); ?>
	<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
	<?php echo $form->textFieldRow($model,'website',array('class'=>'span5','maxlength'=>64)); ?>
	<?php echo $form->textFieldRow($model,'contact',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->dropDownListRow($model,'type',$model->types); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
