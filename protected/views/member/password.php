<?php
$this->breadcrumbs=array(
	'Member Center'=>array('index'),
	'Security Settings',
);

$this->menu=array(
	array('label'=>'Operation'),
	array('label'=>'Member Center','icon'=>'user','url'=>array('index')),
	array('label'=>'Personal Settings','icon'=>'edit','url'=>array('update')),
	array('label'=>'Security Settings','icon'=>'lock','url'=>array('password'),'active'=>true),
);
?>

<h1>Security Settings</h1>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'password-form',
	'type'=>'horizontal',
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<fieldset>
 
	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<legend>Password Settings</legend>
	
	<?php echo $form->passwordFieldRow($model,'old_password',array('class'=>'span5','maxlength'=>255)); ?>
	<?php echo $form->passwordFieldRow($model,'new_password',array('class'=>'span5','maxlength'=>255)); ?>
	<?php echo $form->passwordFieldRow($model,'repeat_new_password',array('class'=>'span5','maxlength'=>255)); ?>

</fieldset>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
	</div>

<?php $this->endWidget(); ?>
