<?php
$this->breadcrumbs=array(
	'Files'=>array('index'),
	'Manage',
);


$this->menu=array(
	array('label'=>'Operation'),
  array('label'=>'My File', 'icon'=>'file', 'url'=>array('index')),
  array('label'=>'List File', 'icon'=>'list', 'url'=>array('list'),'visible'=>Yii::app()->user->isAdmin()),
  array('label'=>'Create File', 'icon'=>'plus', 'url'=>array('create'),'visible'=>Yii::app()->user->isAdmin()),
  array('label'=>'Manage File', 'icon'=>'pencil', 'url'=>array('admin'),'active'=>true,'visible'=>Yii::app()->user->isAdmin()),
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('file-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Files</h1>

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
	'id'=>'file-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'description',
		/*
		'status',
		'is_deleted',
		*/
		array(
			'header'=>'Operation',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>
