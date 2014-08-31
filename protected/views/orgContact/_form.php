<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'org-contact-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>

	<p class="help-block">带<span class="required">*</span> 是必填项目.</p>

	<?php echo $form->errorSummary($model); ?>
	<input type="hidden" name="Org[org_id]" value="<?php echo $oid;?>"/>
	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>60)); ?>

	<?php echo $form->dropDownListRow($model, 'gender', array('0'=>'男','1'=>'女')); ?>

	<?php echo $form->textFieldRow($model,'mobile',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'wechat',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'first_time',array('class'=>'span5 datetime')); ?>

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