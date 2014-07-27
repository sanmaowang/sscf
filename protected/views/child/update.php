<?php
/* @var $this ChildController */
/* @var $model Child */

$this->breadcrumbs=array(
	'Children'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Child', 'url'=>array('index')),
	array('label'=>'Create Child', 'url'=>array('create')),
	array('label'=>'View Child', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Child', 'url'=>array('admin')),
);
?>

<div class="page-header">
<h2>更新 Child <?php echo $model->id; ?></h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>