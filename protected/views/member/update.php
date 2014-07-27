<?php
$this->breadcrumbs=array(
	'Member Center'=>array('index'),
	'Personal Settings',
);

$this->menu=array(
	array('label'=>'Operation'),
	array('label'=>'Member Center','icon'=>'user','url'=>array('index')),
	array('label'=>'Personal Settings','icon'=>'edit','url'=>array('update'),'active'=>true),
	array('label'=>'Security Settings','icon'=>'lock','url'=>array('password')),
);
?>

<h1>Personal Settings</h1>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>
<fieldset>
 
	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<legend>Personal Info</legend>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>20)); ?>
	
	<?php echo $form->textFieldRow($model,'nickname',array('class'=>'span5','maxlength'=>64)); ?>
  
	<?php echo $form->fileFieldRow($model, 'avatar'); ?>

	<?php echo $form->textFieldRow($model,'mobile',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'birthday',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model, 'gender', array('0'=>'Male','1'=>'Female')); ?>
	
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
