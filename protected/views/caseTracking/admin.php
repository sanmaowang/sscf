<?php
$this->breadcrumbs=array(
	'Case Trackings'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CaseTracking','url'=>array('index')),
	array('label'=>'Create CaseTracking','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('case-tracking-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Case Trackings</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'case-tracking-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'case_id',
		'step1',
		'step2',
		'step3',
		'step4',
		/*
		'step5',
		'step6',
		'step7',
		'step8',
		'step9',
		'step10',
		'step11',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
