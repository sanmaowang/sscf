<?php
$this->breadcrumbs=array(
	'My File',
);


$this->menu=array(
	array('label'=>'Operation'),
  array('label'=>'My File', 'icon'=>'file', 'url'=>array('index'),'active'=>true),
  array('label'=>'List File', 'icon'=>'list', 'url'=>array('list'),'visible'=>Yii::app()->user->isAdmin()),
  array('label'=>'Create File', 'icon'=>'plus', 'url'=>array('create'),'visible'=>Yii::app()->user->isAdmin()),
  array('label'=>'Manage File', 'icon'=>'pencil', 'url'=>array('admin'),'visible'=>Yii::app()->user->isAdmin()),
);
?>

<h1>My File</h1>
<table class="table table-striped" style="margin-top:30px;">
	<tr>
		<th>#</th>
		<th>Name</th>
		<th>Description</th>
		<th>Create time</th>
		<th>Operation</th>
	</tr>
	<?php foreach ($model as $key => $file) {?>
	<tr>
		<td><?php echo $key+1;?></td>
		<td><?php echo $file->name;?></td>
		<td><?php echo $file->description;?></td>
		<td><?php echo $file->create_time;?></td>
		<td>
			<a class="btn btn-primary btn-mini" target="_blank" href="<?php echo $this->createUrl('download',array('id'=>$file->id));?>">Download</a>
		</td>
	</tr>
	<?php }?>
</table>

<?php 
$this->widget('CLinkPager', array(
  'currentPage'=>$pages->getCurrentPage(),
  'itemCount'=>$item_count,
  'pageSize'=>$page_size,
  'maxButtonCount'=>5,
  //'nextPageLabel'=>'My text >',
  'header'=>'',
  'htmlOptions'=>array('class'=>'pages'),
  ));
?>