<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'nickname',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'avatar',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'birthday',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'gender',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'home',array('class'=>'span5','maxlength'=>80)); ?>

	<?php echo $form->textFieldRow($model,'height',array('class'=>'span5','maxlength'=>6)); ?>

	<?php echo $form->textFieldRow($model,'weight',array('class'=>'span5','maxlength'=>6)); ?>

	<?php echo $form->textFieldRow($model,'id_card',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'address',array('class'=>'span5','maxlength'=>160)); ?>

	<?php echo $form->textFieldRow($model,'nation',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'citivaltype',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'contact',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'telephone',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textAreaRow($model,'state_desc',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'medical_insurance_rate',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'other_subsidy',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textAreaRow($model,'have_other_illness',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'have_pneumonia',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'operation_hospital',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'doctor',array('class'=>'span5','maxlength'=>80)); ?>

	<?php echo $form->textFieldRow($model,'is_one_time_cure',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'admission_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'operation_plan_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'other_foundation_staff',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'staff',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'applicant',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'source',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'create_by',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'create_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'update_time',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
