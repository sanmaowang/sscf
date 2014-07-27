<?php
$this->breadcrumbs=array(
	'Case Budgets'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CaseBudget','url'=>array('index')),
	array('label'=>'Manage CaseBudget','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>Create CaseBudget</h1>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>