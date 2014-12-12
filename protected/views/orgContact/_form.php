<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'org-contact-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>

	<p class="help-block">带<span class="required">*</span> 是必填项目.</p>

	<?php echo $form->errorSummary($model); ?>
	<input type="hidden" name="Org[org_id]" value="<?php echo $oid;?>"/>
	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>60)); ?>

	<?php 

	if((int)$org->type < 2){
		$departments = $model->departments; 
	}else{
		$departments = $model->other_departments; 
	}
	?>

	<div class="control-group">
		<label class="control-label required" for="OrgContact_department">部门 <span class="required">*</span></label>
		<div class="controls">
			<select name="OrgContact[department]" id="OrgContact_department">
				<?php foreach ($departments as $key => $department) {?>
					<option value="<?php echo $department;?>" <?php if($model->department == $department){echo 'selected="selected"';};?>><?php echo $department;?></option>
				<?php }?>
			</select>
		</div>
	</div>

	<?php echo $form->textFieldRow($model,'job',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->dropDownListRow($model, 'gender', array('0'=>'男','1'=>'女')); ?>

	<?php echo $form->textFieldRow($model,'mobile',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>64)); ?>


	<?php echo $form->textAreaRow($model,'note',array('class'=>'span5','hint'=>'海星联络人与其初步联络时间，重要会议记录')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
