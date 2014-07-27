<?php
$this->breadcrumbs=array(
	'Case Families'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CaseFamily','url'=>array('index')),
	array('label'=>'Create CaseFamily','url'=>array('create')),
	array('label'=>'View CaseFamily','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage CaseFamily','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>更新亲属 <?php echo $model->name; ?></h1>
</div>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>