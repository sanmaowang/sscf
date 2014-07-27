<?php
$this->breadcrumbs=array(
	'Case Files',
);

$this->menu=array(
	array('label'=>'Create CaseFile','url'=>array('create')),
	array('label'=>'Manage CaseFile','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>Case Files</h1>
</div>
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
