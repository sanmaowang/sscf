<?php
$this->breadcrumbs=array(
	'Case'=>array('index'),
	'Update Case Basic Info',
);

$this->menu=array(
	array('label'=>'List Childcase','url'=>array('index')),
	array('label'=>'Manage Childcase','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>案例基本信息/更新</h1>
</div>
<?php echo $this->renderPartial('_simple_form', array('model'=>$model,'users'=>$users,'orgs'=>$orgs)); ?>