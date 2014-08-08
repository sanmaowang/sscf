<?php
$this->breadcrumbs=array(
	'合作机构'=>array('org/index'),
);
if($menu){
	$this->breadcrumbs +=array_reverse($menu);
}
array_push($this->breadcrumbs,$model->name);

?>

<h1>查看联系人 #<?php echo $model->name; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'gender',
		'mobile',
		'email',
		'wechat',
		'first_time',
	),
)); ?>
