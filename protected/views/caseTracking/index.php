<?php
$this->breadcrumbs=array(
	'Case Trackings',
);

$this->menu=array(
	array('label'=>'Create CaseTracking','url'=>array('create')),
	array('label'=>'Manage CaseTracking','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>Case Trackings</h1>
</div>
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
