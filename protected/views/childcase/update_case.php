<?php
$this->breadcrumbs=array(
	'Case'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Childcase','url'=>array('index')),
	array('label'=>'Manage Childcase','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>更新案例</h1>
</div>
<?php echo $this->renderPartial('_simple_form', array('model'=>$model,'users'=>$users,'orgs'=>$orgs)); ?>