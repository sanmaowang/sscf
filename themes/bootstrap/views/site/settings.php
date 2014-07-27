<div style="margin-bottom:20px;float:right;"><a href="<?php echo $this->createUrl('site/index');?>"><?php echo Yii::t('site','My Receipts');?></a> | <a href="<?php echo $this->createUrl('site/settings');?>"><?php echo Yii::t('site','Settings');?></a></div>
<p style="margin-bottom:20px;"><?php echo Yii::t('site','Hello');?>, <?php echo Yii::app()->user->name;?>(<a href="<?php echo $this->createUrl('site/logout');?>" style="font-size:11px;"><?php echo Yii::t('site','Logout');?></a>)</p>
<h1 class="entry-title"><?php echo Yii::t('site','Settings');?></h1>
<br>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'password-form',
	'type'=>'horizontal',
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<fieldset>
 
	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->passwordFieldRow($model,'old_password',array('class'=>'span5','maxlength'=>255)); ?>
	<?php echo $form->passwordFieldRow($model,'new_password',array('class'=>'span5','maxlength'=>255)); ?>
	<?php echo $form->passwordFieldRow($model,'repeat_new_password',array('class'=>'span5','maxlength'=>255)); ?>

</fieldset>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : Yii::t('site','Save'),
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>Yii::t('site','Reset'))); ?>
	</div>

<?php $this->endWidget(); ?>
