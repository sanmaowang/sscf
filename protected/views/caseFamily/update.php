<?php
if($model->is_immediate){
	$flag = 'family';
}else{
	$flag = 'other';
}
$this->breadcrumbs=array(
	'案例'=>array('childcase/index'),
	$model->case->name=>array('childcase/update','id'=>$model->case_id,'flag'=>$flag),
	'更新家属',
);

$this->menu=array(
	array('label'=>'List CaseFamily','url'=>array('index')),
	array('label'=>'Create CaseFamily','url'=>array('create')),
	array('label'=>'View CaseFamily','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage CaseFamily','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>更新亲属 <?php echo $model->name; ?></h1>
</div>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>