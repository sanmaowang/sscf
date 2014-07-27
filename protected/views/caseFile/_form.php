<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'case-file-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>
	<p class="help-block">带<span class="required">*</span> 是必填项目.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->dropDownListRow(
	$model,'key',array(
			"family_idcard"=>"父母及监护人身份证",
			"family_registry"=>"患儿及家庭成员户口本",
			"family_proof"=>"贫困证明（乡级以上盖章有效）",
			"family_other"=>"其它",
			"pic_life"=>"患儿生活照片",
			"pic_household"=>"家庭房屋照片",
			"pic_visit"=>"海星探视孩子照片",
			"pic_other"=>'其它照片',
			"mbg_echocardiography"=>"心脏彩超（超声心动）报告",
			"mbg_IV"=>"导管诊断报告（如做导管）",
			"mbg_X_Ray"=>"胸部X光片报告（有肺炎记录）",
			"mbg_CT_Directed"	=>"CT引导穿刺",
			"mbg_3D_Echocardiography"	=>"三维心超图、心电图",
			"mbg_Lung_infection"	=>"肺炎住院纪录、肺炎用药治疗纪录（有过肺炎并住院治疗的患儿）",
			"mbg_Incurred_medical_expenses"	=>"已经产生的医疗费用收费单据（已经有过手术或者肺炎治疗的孩子）",
			"mbg_other"=>"其他资料",
			"case_Hospital_Receipt"=>"医院收据",
			"case_Expenses_Breakdown"=>"费用清单",
			"case_Discharge_Summary"=>"出院小结",
			"case_Funding_Source"=>"手术资金来源和费用明细(EXCEL)",
			"case_other"=>'其他文件',
			"appfile_Indemnity_Agreement"=>"免责协议",
			"appfile_other"=>"其他文件"
		)
	); ?>

	<?php echo $form->fileFieldRow($model,'path',array('class'=>'span5','hint'=>'当前文件: <a href="/uploads/file/'.$model->path.'">'.$model->title.'</a>')); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>60)); ?>

	<?php echo $form->textAreaRow($model,'desc',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
