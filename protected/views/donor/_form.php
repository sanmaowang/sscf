<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'donor-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'enableClientValidation' => true,
  'clientOptions' => array(
      'validateOnSubmit' => true,
  ),
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>
<fieldset>

	<p class="help-block">带<span class="required">*</span> 是必填项目.</p>

	<?php echo $form->errorSummary($model); ?>

  <legend>Account Info</legend>
	
	<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>64)); ?>

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

	<?php echo $form->textFieldRow($model,'id_card',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->dropDownListRow($model, 'gender', array('0'=>'Male','1'=>'Female')); ?>

	<?php echo $form->textFieldRow($model,'birthday',array('class'=>'span5 datetime')); ?>

	<?php echo $form->textFieldRow($model,'company',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'job',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'department',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'mobile',array('class'=>'span5','maxlength'=>15)); ?>

</fieldset>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

<?php
    $baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCssFile($baseUrl."/js/vendor/datepicker/datepicker.css");
    $cs->registerScriptFile($baseUrl."/js/vendor/datepicker/bootstrap-datepicker.js");
		$cs->registerScript('datetime', "
    	$('.datetime').datepicker({
    		format:'yyyy/mm/dd'
    	});
		", CClientScript::POS_END);
?>
