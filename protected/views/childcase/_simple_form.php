<?php 
$u = array();
$o = array();
$applicant = "";
foreach($users as $user){
	$u[$user->id] = $user->name;
}
foreach ($orgs as $org) {
	$o[$org->id] = $org->name;
	if(count($org->contact) > 0){
		$applicant .= "<option value=".$org->contact->id.">".$org->contact->name."</option>";
	}
}
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'childcase-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">带<span class="required">*</span> 是必填项目.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span3','maxlength'=>25)); ?>
	<?php echo $form->dropDownListRow($model,'source',$o); ?>
	<?php echo $form->textFieldRow($model,'other_foundation_staff',array('class'=>'span3','maxlength'=>11)); ?>
	
	<?php echo $form->dropDownListRow($model,'staff',$u); ?>
	<?php echo $form->textFieldRow($model,'applicant',array('class'=>'span3','maxlength'=>11)); ?>
	<?php echo $form->textFieldRow($model,'applicant_relationship',array('class'=>'span3','maxlength'=>11)); ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
