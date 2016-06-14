<?php
$this->breadcrumbs=array(
	'海星团队'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Operation'),
  array('label'=>'List User', 'icon'=>'list', 'url'=>array('index')),
  array('label'=>'Manage User', 'icon'=>'pencil', 'url'=>array('admin'),'active'=>true),
  array('label'=>'Create User', 'icon'=>'plus', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>

<div class="search-form" style="margin-top:20px;display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'user-grid',
	'type'=>'striped',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'columns'=>array(
		array('name'=>'id', 'header'=>'#'),
    array('name'=>'username', 'header'=>'Username'),
    array('name'=>'name', 'header'=>'Name'),
    array('name'=>'email', 'header'=>'Email'),
    array('name'=>'mobile', 'header'=>'Mobile'),
		/*
		'job_number',
		'department',
		'password',
		'nickname',
		'avatar',
		'create_time',
		'update_time',
		'login_count',
		'role',
		'is_deleted',
		*/
		array(
			'header'=>'Operation',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>
