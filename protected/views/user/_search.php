<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span4','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'id_card',array('class'=>'span4','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'job_number',array('class'=>'span4','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'department',array('class'=>'span4','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span4','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'mobile',array('class'=>'span4','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'nickname',array('class'=>'span4','maxlength'=>64)); ?>

	<?php echo $form->dropDownListRow($model, 'role', array('0'=>'User','1'=>'Admin')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
