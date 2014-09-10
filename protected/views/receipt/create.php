<?php
$this->breadcrumbs=array(
	'Receipts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Receipt','url'=>array('index')),
	array('label'=>'Manage Receipt','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>Create Receipt</h1>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>