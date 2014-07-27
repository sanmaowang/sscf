<?php
$this->breadcrumbs=array(
	'Other Orgs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OtherOrg','url'=>array('index')),
	array('label'=>'Manage OtherOrg','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>新建机构</h1>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model,'all'=>$all)); ?>