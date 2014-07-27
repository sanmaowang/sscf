<?php
$this->breadcrumbs=array(
	'Case Files'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CaseFile','url'=>array('index')),
	array('label'=>'Manage CaseFile','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>Create CaseFile</h1>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>