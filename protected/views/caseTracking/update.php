<?php
$this->breadcrumbs=array(
	'Case Trackings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
?>
<div class="page-header">
<h1>Update CaseTracking <?php echo $model->id; ?></h1>
</div>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>