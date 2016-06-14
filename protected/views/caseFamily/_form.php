<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'case-family-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">带<span class="required">*</span> 是必填项目.</p>
	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>80)); ?>
	
	<?php echo $form->errorSummary($model); ?>
	<?php if($model->is_immediate){?>
	<?php echo $form->dropDownListRow($model,'relationship',$model->r_label); ?>
	<?php }else{?>
	<?php echo $form->textFieldRow($model,'relationship',array('class'=>'span5','maxlength'=>80)); ?>
	<?php }?>
	<?php echo $form->textFieldRow($model,'age',array('class'=>'span5')); ?>
	<?php if($model->is_immediate){?>
	<?php echo $form->textFieldRow($model,'id_card',array('class'=>'span5','maxlength'=>80)); ?>
	<?php echo $form->dropDownListRow($model,'education',$model->r_edu); ?>

	<?php echo $form->textFieldRow($model,'nation',array('class'=>'span5','maxlength'=>25)); ?>
	<?php }?>
	<?php echo $form->textFieldRow($model,'career',array('class'=>'span5','maxlength'=>80)); ?>
		
	<?php if(!$model->is_immediate){?>
	<?php echo $form->textFieldRow($model,'health_state',array('class'=>'span5','maxlength'=>80)); ?>
	<?php }?>
	<?php echo $form->textFieldRow($model,'annual_income',array('class'=>'span5','maxlength'=>25)); ?>
	<?php if(!$model->is_immediate){?>
	<?php echo $form->textAreaRow($model,'note',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
	<?php }?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
