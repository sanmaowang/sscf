<?php
$this->breadcrumbs=array(
	'Case Budgets',
);

$this->menu=array(
	array('label'=>'Create CaseBudget','url'=>array('create')),
	array('label'=>'Manage CaseBudget','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>Case Budgets</h1>
</div>
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
