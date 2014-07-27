<?php
$this->breadcrumbs=array(
	'Cases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cases','url'=>array('index')),
	array('label'=>'Create Cases','url'=>array('create')),
	array('label'=>'View Cases','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Cases','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>Update Cases <?php echo $model->id; ?></h1>
</div>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>