<?php
$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'Operation'),
  array('label'=>'List User', 'icon'=>'list', 'url'=>array('index'),'active'=>true),
  array('label'=>'Create User', 'icon'=>'plus', 'url'=>array('create')),
  array('label'=>'Manage User', 'icon'=>'pencil', 'url'=>array('admin')),
);
?>

<h1>Users</h1>
<p>List all the users include admin users..</p>
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'id'=>'users_list',
	'htmlOptions'=>array('class'=>'row-fluid')
)); ?>
