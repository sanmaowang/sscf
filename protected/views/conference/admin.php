<?php
$this->breadcrumbs=array(
	'会议'=>array('index'),
	'会议管理',
);

$this->menu=array(
	array('label'=>'会议管理','url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('conference-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="page-header">
<h1>会议管理</h1>
</div>
<p>
<a href="<?php echo $this->createUrl('create');?>" class="btn">创建新会议</a>
</p>

<table class="table">
	<thead>
	<tr>
		<th>#</th>
		<th>会议时间</th>
		<th colspan=2>操作</th>
	</tr>
	</thead>
	<tbody>
		<?php foreach ($model as $key => $m) {?>
	<tr>
		<td><?php echo $key+1;?></td>
		<td><?php echo $m->getName();?></td>
		<td width="30%">
			<a href="<?php echo $this->createUrl('record',array('id'=>$m->id));?>" class="btn">修改记录</a>	
			<a href="<?php echo $this->createUrl('view',array('id'=>$m->id));?>" class="btn">查看记录</a>	
		</td>
		<td width='20'>
			<a href="<?php echo $this->createUrl('delete',array('id'=>$m->id));?>" class="text-right"><i class="icon-trash text-right"></i></a>
		</td>
	</tr>
		<?php }?>
	
	</tbody>
</table>
