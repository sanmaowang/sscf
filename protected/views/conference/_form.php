<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'conference-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->dropDownListRow($model,'type',$status = array(0 => "Donation Committee")); ?>
	<?php echo $form->textFieldRow($model,'start_time',array('class'=>'span5 datetime','maxlength'=>25)); ?>

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
    		format:'yyyy-mm-dd'
    	});
		", CClientScript::POS_END);
?>