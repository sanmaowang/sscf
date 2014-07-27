<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
?>


<div class="content">
		<h1 class="entry-title"><?php echo Yii::t('site','Login');?></h1>
		<div class="login-form form">
		<p class="note"><?php echo Yii::t('site','Please fill out the following form with your login credentials');?></p>
					<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'login-form',
		    'type'=>'horizontal',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>

	<p class="note"><?php echo Yii::t('site','Fields with <span class="required">*</span> are required');?></p>

	<?php echo $form->textFieldRow($model,'username'); ?>

	<?php echo $form->passwordFieldRow($model,'password'); ?>

	<?php echo $form->checkBoxRow($model,'rememberMe'); ?>
	<div class="form-actions" style="background:#fff;border:none;padding-top:0;">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>Yii::t('site','Login'),
        )); ?>
	</div>
	
	<?php $this->endWidget(); ?>
	</div>

</div><!-- form -->

