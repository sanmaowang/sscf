<?php
$this->breadcrumbs=array(
	'合作机构'=>array('org/index'),
);
if($menu){
	$this->breadcrumbs +=array_reverse($menu);
}
array_push($this->breadcrumbs,'更新联系人');

$this->menu=array(
	array('label'=>'List OrgContact','url'=>array('index')),
	array('label'=>'Manage OrgContact','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>更新 <?php echo $model->name; ?></h1>
</div>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>