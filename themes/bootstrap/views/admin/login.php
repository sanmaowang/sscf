<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>


<div class="form">
<div class="row-fluid">
	<div class="span6" style="padding-top:20px;">
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/cover.jpg',"cover"); ?> 
	</div>
	<div class="span6">
		<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>
			<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
    'type'=>'horizontal',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->textFieldRow($model,'username'); ?>

	<?php echo $form->passwordFieldRow($model,'password'); ?>

	<?php echo $form->checkBoxRow($model,'rememberMe'); ?>
	<div class="form-actions" style="background:#fff;border:none;padding-top:0;">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>'Login',
        )); ?>
	</div>
	</div>
	
</div>
	

<?php $this->endWidget(); ?>

</div><!-- form -->

