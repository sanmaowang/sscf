<?php
/* @var $this MedicalInfoController */
/* @var $model MedicalInfo */
/* @var $form CActiveForm */
?>

<div class="row-fluid">
	<div class="span8">
		<div class="form form-horizontal">

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'medical-info-form',
			'enableAjaxValidation'=>false,
		)); ?>

			<p class="note"><span class="required">*</span> 是必填项目.</p>

			<?php echo $form->errorSummary($model); ?>

			<div class="control-group">
				<?php echo $form->labelEx($model,'title',array('class'=>'control-label')); ?>
				<div class="controls">
				<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>80,'class'=>'span5')); ?>
				<?php echo $form->error($model,'title'); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo $form->labelEx($model,'content',array('class'=>'control-label')); ?>
				<div class="controls">
				<?php echo $form->textArea($model,'content',array('rows'=>15, 'cols'=>50,'class'=>'span8')); ?>
				<?php echo $form->error($model,'content'); ?>
				</div>
			</div>

			<div class="control-group">
				<div class="form-actions buttons">
				<?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存',array('class'=>'btn btn-primary')); ?>
				</div>
			</div>

		<?php $this->endWidget(); ?>

		</div><!-- form -->
	</div>
	<div class="span4">
		<?php foreach ($files as $key => $file) {?>
    	<a class="files" href="<?php echo IMG_CLOUD.'/case/'.$folder.'/'.$file->path;?>">
    		<?php 
			  	echo CHtml::image(IMG_CLOUD.'/case/'.$folder.'/'.$file->path,"file",array("width"=>300,"height"=>200)); 
				?>
			</a>
		<?php }?>
	</div>
</div>

<?php
  Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js/vendor/redactor/redactor.css');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/vendor/redactor/redactor.min.js',CClientScript::POS_END);
  Yii::app()->clientScript->registerScript('form-content', '
    $(function(){
      $("#MedicalInfo_content").redactor({
      	minHeight: 200
      });
  })', CClientScript::POS_END);
?>

