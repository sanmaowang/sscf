<?php
$this->breadcrumbs=array(
	'Case'=>array('childcase/index'),
	$model->case->name=>array('childcase/view','id'=>$model->case->id),
	$model->getCateLabel() => array('childcase/update','id'=>$model->case->id,'flag'=>$model->getCate()),
	$model->title
);
?>
<div class="page-header">
<h1>更新文件 #<?php echo $model->title; ?></h1>
</div>
<?php echo $this->renderPartial('_form',array('model'=>$model,'flag'=>$flag)); ?>