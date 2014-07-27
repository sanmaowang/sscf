<?php
$this->breadcrumbs=array(
	'Case Families'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CaseFamily','url'=>array('index')),
	array('label'=>'Manage CaseFamily','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>Create CaseFamily</h1>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>