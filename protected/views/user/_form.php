<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>
<fieldset>
 
	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

  <legend>Account Info</legend>
	
	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>64)); ?>


	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->dropDownListRow($model, 'role', array('0'=>'User','1'=>'Admin')); ?>

	<div class="control-group ">
		<div class="controls">
			<label class="checkbox" for="User_notify">
				<input name="User[notify]" id="User_notify" value="1" type="checkbox">
				Send a notify mail
			</label>
		</div>
	</div>
	
	<legend>Personal Info</legend>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>20)); ?>
	
	<?php echo $form->textFieldRow($model,'nickname',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'mobile',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'birthday',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model, 'gender', array('0'=>'Male','1'=>'Female')); ?>
	
	<?php echo $form->dropDownListRow($model, 'marital_status', array('0'=>'Single','1'=>'Married')); ?>

	<?php echo $form->textFieldRow($model,'id_card',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'job_number',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'department',array('class'=>'span5','maxlength'=>64)); ?>

</fieldset>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
