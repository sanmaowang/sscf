<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'childcase-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); ?>
<legend>病情描述</legend>
	<p class="help-block">带<span class="required">*</span> 是必填项目.</p>

	<?php echo $form->errorSummary($model); ?>
	<p></p>
	<?php echo $form->textAreaRow($model,'state_desc',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'medical_insurance_rate',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'other_subsidy',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textAreaRow($model,'have_other_illness',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'have_pneumonia',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'operation_hospital',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'doctor',array('class'=>'span5','maxlength'=>80)); ?>

	<?php echo $form->textFieldRow($model,'is_one_time_cure',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'admission_time',array('class'=>'span5 datetime')); ?>

	<?php echo $form->textFieldRow($model,'operation_plan_time',array('class'=>'span5 datetime')); ?>

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
