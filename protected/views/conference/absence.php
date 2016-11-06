<?php
$this->breadcrumbs=array(
	'会议'=>array('index'),
	$model->getName(),
	'请假',
);

$this->menu=array(
	array('label'=>'Conference'),
	array('label'=>'正在进行的会议','url'=>array('index')),
	array('label'=>'已结束的会议','url'=>array('index?archive=1')),
	array('label'=>'Manage'),
	array('label'=>'会议管理','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>请假</h1>
<h4>缺席 <?php echo $model->getName();?></h4>
</div>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'conference-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>

	<?php echo $form->errorSummary($model); ?>
	<div class="control-group">
		<label class="control-label">成员</label>
		<div class="controls">
			<?php echo Yii::app()->user->name;?>
		</div>
	</div>
	<?php echo $form->textAreaRow($absence_model,'reason',array('rows'=>6, 'cols'=>50, 'class'=>'span8','placeholder'=>'请说明缺席本次会议的原因')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '保存' : '提交',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
