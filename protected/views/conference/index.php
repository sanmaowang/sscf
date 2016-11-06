<?php
$this->breadcrumbs=array(
	'会议',
);

$this->menu=array(
	array('label'=>'Conference'),
	array('label'=>'正在进行的会议','url'=>array('index')),
	array('label'=>'已结束的会议','url'=>array('index?archive=1')),
	array('label'=>'Manage'),
	array('label'=>'会议管理','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>会议</h1>
</div>
<table class="table">
	<thead>
	<tr>
		<th>#</th>
		<th>会议时间</th>
		<th>操作</th>
	</tr>
	</thead>
	<tbody>
		<?php foreach ($model as $key => $m) {?>
	<tr>
		<td><?php echo $key+1;?></td>
		<td><?php echo $m->getName();?></td>
		<td>
			<?php if($archive){?>
				<a href="<?php echo $this->createUrl('view',array('id'=>$m->id));?>">会议记录</a>
			<?php }else{?>
				<a href="<?php echo $this->createUrl('absence',array('id'=>$m->id));?>" class="btn">请假</a>
			<?php }?>
		</td>
	</tr>
		<?php }?>
	
	</tbody>
</table>