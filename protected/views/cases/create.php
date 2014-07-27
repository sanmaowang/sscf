<?php
$this->breadcrumbs=array(
	'Cases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cases','url'=>array('index')),
	array('label'=>'Manage Cases','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>Create Cases</h1>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>