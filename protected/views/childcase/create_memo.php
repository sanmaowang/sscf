<?php
/* @var $this ChildcaseController */
/* @var $model Childcase */

$this->breadcrumbs=array(
	'患儿案例'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'List Childcase', 'url'=>array('index')),
	array('label'=>'Manage Childcase', 'url'=>array('admin')),
);
?>
<h2>创建患儿案例</h2>

<div class="form form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'childcase-form',
	'enableAjaxValidation'=>false,
)); ?>
<legend>患儿基本信息</legend>

	<p class="note"><span class="required">*</span> 是必填项目.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="control-group">
		<?php echo $form->labelEx($model,'name',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'name',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'nickname',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'nickname',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'nickname'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'avatar',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'avatar',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'avatar'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'birthday',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'birthday'); ?>
		<?php echo $form->error($model,'birthday'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'gender',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'gender'); ?>
		<?php echo $form->error($model,'gender'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'home',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'home',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'home'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'height',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'height',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'height'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'weight',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'weight',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'weight'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'id_card',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'id_card',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'id_card'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'address',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>160)); ?>
		<?php echo $form->error($model,'address'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'nation',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'nation',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'nation'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'citivaltype',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'citivaltype',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'citivaltype'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'contact',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'contact',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'contact'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'telephone',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'telephone',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'telephone'); ?>
		</div>
	</div>
<legend>病情描述</legend>
	<div class="control-group">
		<?php echo $form->labelEx($model,'state_desc',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textArea($model,'state_desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'state_desc'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'medical_insurance_rate',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'medical_insurance_rate',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'medical_insurance_rate'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'other_subsidy',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'other_subsidy',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'other_subsidy'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'have_other_illness',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textArea($model,'have_other_illness',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'have_other_illness'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'have_pneumonia',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textArea($model,'have_pneumonia',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'have_pneumonia'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'operation_hospital',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'operation_hospital',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'operation_hospital'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'doctor',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'doctor',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'doctor'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'is_one_time_cure',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'is_one_time_cure'); ?>
		<?php echo $form->error($model,'is_one_time_cure'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'admission_time',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'admission_time'); ?>
		<?php echo $form->error($model,'admission_time'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'operation_plan_time',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'operation_plan_time'); ?>
		<?php echo $form->error($model,'operation_plan_time'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'other_foundation_staff',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'other_foundation_staff',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'other_foundation_staff'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'staff',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'staff',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'staff'); ?>
		</div>
	</div>

	<div class="control-group">
		<?php echo $form->labelEx($model,'applicant',array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'applicant',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'applicant'); ?>
		</div>
	</div>

	<div class="control-group">
		<div class="form-actions buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存',array('class'=>'btn btn-primary')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->