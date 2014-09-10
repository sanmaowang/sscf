<?php
$this->breadcrumbs=array(
	'Receipts',
);

$this->menu=array(
	array('label'=>'Create Receipt','url'=>array('create')),
	array('label'=>'Manage Receipt','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>Receipts</h1>
</div>
<div class="row-fluid">
    <div class="swfupload">
      <i class="icon-plus"></i><span id="swfupload"></span>
    </div>
    <div id="divFileProgressContainer"></div>
 </div>
<table class="table table-striped" style="margin-top:30px;">
	<tr>
		<th>#</th>
		<th>Name</th>
		<th>Description</th>
		<th>Create time</th>
		<th>Owner</th>
		<th>Operation</th>
	</tr>
	<?php foreach ($model as $key => $file) {?>
	<tr>
		<td><?php echo $key+1;?></td>
		<td><a href="<?php echo $this->createUrl('file/view',array('id'=>$file->id));?>"><?php echo $file->name;?></a></td>
		<td><?php echo $file->description;?></td>
		<td><?php echo $file->create_time;?></td>
		<td><?php if(isset($file->user)){ 
			foreach($file->user as $key=>$user){  if($key != 0){ echo ', ';} echo $user->username;}
		}?></td>
		<td>
      <a class="btn btn-info btn-mini"  href="<?php echo $this->createUrl('view',array('id'=>$file->id))?>">View</a>
			<a class="btn btn-primary btn-mini" target="_blank" href="<?php echo Yii::app()->baseUrl.'/file/download/'.$file->id;?>">Download</a>
		</td>
	</tr>
	<?php }?>
</table>
<div class="pagination">
<?php 
$this->widget('bootstrap.widgets.TbPager', array(
  'currentPage'=>$pages->getCurrentPage(),
  'itemCount'=>$item_count,
  'pageSize'=>$page_size,
  'maxButtonCount'=>5,
  //'nextPageLabel'=>'My text >',
  'header'=>'',
  'htmlOptions'=>array('class'=>'pages'),
  ));
?>
</div>
