<?php
$this->breadcrumbs=array(
	'Case Families',
);

$this->menu=array(
	array('label'=>'Create CaseFamily','url'=>array('create')),
	array('label'=>'Manage CaseFamily','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>Case Families</h1>
</div>
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
