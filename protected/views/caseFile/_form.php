<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'case-file-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>
	<p class="help-block">带<span class="required">*</span> 是必填项目.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->radioButtonListRow($model, 'key', FileArray::getDropDown($flag)); ?>

	<?php echo $form->fileFieldRow($model,'path',array('class'=>'span5','hint'=>'当前文件: <a href="/uploads/file/'.$model->path.'">'.$model->title.'</a>')); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>60,'hint'=>'请附上报告日期')); ?>

	<?php echo $form->textAreaRow($model,'desc',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
