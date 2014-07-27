<?php
$this->breadcrumbs=array(
	'Case Budgets'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CaseBudget','url'=>array('index')),
	array('label'=>'Create CaseBudget','url'=>array('create')),
	array('label'=>'View CaseBudget','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage CaseBudget','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>Update CaseBudget <?php echo $model->id; ?></h1>
</div>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>