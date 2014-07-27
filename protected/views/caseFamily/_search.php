<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'case_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'relationship',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'is_immediate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'age',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_card',array('class'=>'span5','maxlength'=>80)); ?>

	<?php echo $form->textFieldRow($model,'education',array('class'=>'span5','maxlength'=>80)); ?>

	<?php echo $form->textFieldRow($model,'nation',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'health_state',array('class'=>'span5','maxlength'=>80)); ?>

	<?php echo $form->textFieldRow($model,'career',array('class'=>'span5','maxlength'=>80)); ?>

	<?php echo $form->textFieldRow($model,'annual_income',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textAreaRow($model,'economical_source_desc',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'special_desc',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'note',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

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
