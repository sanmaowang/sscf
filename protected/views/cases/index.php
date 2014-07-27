<?php
$this->breadcrumbs=array(
	'Cases',
);

$this->menu=array(
	array('label'=>'Create Cases','url'=>array('create')),
	array('label'=>'Manage Cases','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>Cases</h1>
</div>
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
