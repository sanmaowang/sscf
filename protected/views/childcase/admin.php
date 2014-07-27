<?php
$this->breadcrumbs=array(
	'Childcases'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Childcase','url'=>array('index')),
	array('label'=>'Create Childcase','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('childcase-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Childcases</h1>

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
	'id'=>'childcase-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'nickname',
		'avatar',
		'birthday',
		'gender',
		/*
		'home',
		'height',
		'weight',
		'id_card',
		'address',
		'nation',
		'citivaltype',
		'contact',
		'telephone',
		'state_desc',
		'medical_insurance_rate',
		'other_subsidy',
		'have_other_illness',
		'have_pneumonia',
		'operation_hospital',
		'doctor',
		'is_one_time_cure',
		'admission_time',
		'operation_plan_time',
		'other_foundation_staff',
		'staff',
		'applicant',
		'source',
		'create_by',
		'status',
		'create_time',
		'update_time',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
