<?php
$this->breadcrumbs=array(
	'合作机构'=>array('org/index'),
	$org->name => array('org/view','id'=>$org->id),
	'更新联系人'
);
?>
<div class="page-header">
<h1>更新 <?php echo $model->name; ?></h1>
</div>
<?php echo $this->renderPartial('_form',array('model'=>$model,'org'=>$org)); ?>