<?php
$this->breadcrumbs=array(
	'案例'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Childcase','url'=>array('index')),
	array('label'=>'Manage Childcase','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>新建案例</h1>
</div>
<?php echo $this->renderPartial('_simple_form', array('model'=>$model,'users'=>$users,'orgs'=>$orgs)); ?>