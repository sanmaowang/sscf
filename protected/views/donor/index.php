<?php
$this->breadcrumbs=array(
	'捐赠者',
);

$this->menu=array(
  array('label'=>'Operation'),
  array('label'=>'Donors','icon'=>'user', 'url'=>array('donor/index'),'active'=>true),
  array('label'=>'Receipts','icon'=>'file', 'url'=>array('receipt/list')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('donor-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="page-header row-fluid">
	<div class="span4">
		<h1>捐赠者</h1>
	</div>
	<div class="span8 text-right" style="padding-top:20px;">
    <a href="<?php echo $this->createUrl('create')?>" class="btn btn-primary" style="position:relative;"><i class="icon-plus icon-white"></i> 新增捐赠者</a> 
  </div>
</div>
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none;margin-top:20px;">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'donor-grid',
	'type'=>'striped',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
		'username',
		'name',
		'email',
		'mobile',
		/*
		'company',
		'job',
		'department',
		'password',
		'mobile',
		'avatar',
		'create_time',
		'update_time',
		'login_count',
		'role',
		'is_deleted',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
