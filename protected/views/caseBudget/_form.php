<?php 
$type = isset($model->type)?$model->type:$_GET['type'];
$fee_type = isset($model->fee_type)?$model->fee_type:$_GET['fee_type']; 
$first = isset($first)?$first:$_GET['first'];
$o = array();

foreach ($orgs as $org) {
	$o[$org->id] = $org->name;
}

?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'case-budget-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'enableClientValidation' => true,
  'clientOptions' => array(
      'validateOnSubmit' => true,
  ),
)); ?>
	<p class="help-block">带<span class="required">*</span> 是必填项目.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<?php 

		if($type == 'hospital_cost' || $type == "hospital_budget"){

	?>
	<div class="control-group ">
		<label class="control-label required" for="CaseBudget_source">数据 <span class="required">*</span></label>
		<div class="controls">
			<input name="CaseBudget[type]" id="CaseBudget_type" type="hidden" value="<?php echo $type;?>"/>
			<input class="span5" name="CaseBudget[type_read]" id="CaseBudget_type_read" type="text" value="<?php echo $model->getType($type);?>" readonly = 'true'/>
			<span class="help-inline error" id="CaseBudget_source_em_" style="display: none"></span>
		</div>
	</div>
	<div class="control-group ">
		<label class="control-label required" for="CaseBudget_last_date"><?php if($type == 'hospital_cost'){ echo "结账日期";} elseif($type == 'hospital_budget'){ echo "预算日期";}?> <span class="required">*</span></label>
		<div class="controls">
		<?php echo $form->textField($model,'last_date',array('class'=>'span5 datetime')); ?>
		</div>
	</div>
	
	<?php }else{?>
	<?php echo $form->dropDownListRow($model, 'type', $model->getTypes($fee_type)); ?>
	<?php if($first){?>
		<div class="control-group ">
		<label class="control-label required" for="CaseBudget_last_date">截止日期 <span class="required">*</span></label>
		<div class="controls">
		<?php echo $form->textField($model,'last_date',array('class'=>'span5 datetime')); ?>
		</div>
	</div>
	<?php }?>
	<?php }?>
	<?php echo $form->dropDownListRow($model,'source',$o); ?>


	<?php echo $form->textFieldRow($model,'amount',array('class'=>'span5','hint'=>'单位为元，只填写数字即可')); ?> 

	<?php echo $form->textAreaRow($model,'note',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

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
