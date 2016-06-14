<?php
$this->breadcrumbs=array(
	'海星团队',
);

$this->menu=array(
	array('label'=>'Operation'),
  array('label'=>'List User', 'icon'=>'list', 'url'=>array('index'),'active'=>true),
  array('label'=>'Manage User', 'icon'=>'pencil', 'url'=>array('admin')),
  array('label'=>'Create User', 'icon'=>'plus', 'url'=>array('create')),
);
?>

<h1>海星团队</h1>
<p>List all the users include adminmaster..</p>
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'id'=>'users_list',
	'htmlOptions'=>array('class'=>'row-fluid')
)); ?>
