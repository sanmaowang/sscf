<?php
$this->breadcrumbs=array(
	'Org Contacts',
);

$this->menu=array(
	array('label'=>'Create OrgContact','url'=>array('create')),
	array('label'=>'Manage OrgContact','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>Org Contacts</h1>
</div>
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
