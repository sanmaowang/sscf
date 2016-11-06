<?php
$this->breadcrumbs=array(
	'会议'=>array('index'),
	'创建会议',
);

$this->menu=array(
	array('label'=>'Conference'),
	array('label'=>'正在进行的会议','url'=>array('index')),
	array('label'=>'已结束的会议','url'=>array('index?archive=1')),
	array('label'=>'Manage'),
	array('label'=>'会议管理','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>创建会议</h1>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
