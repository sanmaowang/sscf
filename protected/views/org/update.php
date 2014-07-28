<?php
$this->breadcrumbs=array(
	'Orgs'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OtherOrg','url'=>array('index')),
	array('label'=>'Create OtherOrg','url'=>array('create')),
	array('label'=>'View OtherOrg','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage OtherOrg','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>更新机构 <?php echo $model->name; ?></h1>
</div>
<?php echo $this->renderPartial('_form',array('model'=>$model,'all'=>$all)); ?>