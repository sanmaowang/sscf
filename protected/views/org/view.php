<?php

$this->breadcrumbs=array(
	'合作机构'=>array('index'),
);
if($menu){
	$this->breadcrumbs +=array_reverse($menu);
}
array_push($this->breadcrumbs,$model->name);
?>
<div class="row-fluid">
	<div class="span4">
		<h2>#<?php echo $model->name; ?></h2>
	</div>
	<div class="span8 text-right" style="padding-top:15px;">
	</div>
</div>
<div class="row-fluid">
	<div class="span3">
		<div class="row-fluid">
			<div class="span6">
				<h3>客户信息</h3>
			</div>
			<div class="span6 text-right" style="padding-top:18px;">
				<a href="<?php echo $this->createUrl('update',array('id'=>$model->id))?>" class="btn btn-primary btn-small"><i class="icon-edit icon-white"></i>  编辑客户</a>
			</div>
		</div>
	<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'contact',
		'create_time',
		'update_time',
	),
)); ?>
	</div>
	<div class="span9">
		<div class="row-fluid">
			<div class="span6">
				<h3>下属机构</h3>
			</div>
			<div class="span6 text-right" style="padding-top:15px;">
				<a href="<?php echo $this->createUrl('create',array('pid'=>$model->id))?>" class="btn btn-primary btn-small"><i class="icon-plus icon-white"></i>  新建下属机构</a>
			</div>
		</div>
		<table class="table">
			<thead>
				<tr>
					<td>#</td>
					<td>机构名称</td>
					<td>操作</td>
				</tr>
			</thead>
			<tbody>
			<?php foreach($model->sub as $index=>$c):?>
				<tr>
					<td><?php echo $index+1;?></td>
					<td><a href="<?php echo $this->createUrl('view',array('id'=>$c->id))?>"><?php echo $c->name;?></a></td>
					<td>
						<a href="<?php echo $this->createUrl('update',array('id'=>$c->id));?>" class="btn btn-primary btn-mini">编辑</a>
					</td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>

	<div class="row-fluid">
			<div class="span6">
				<h3>联系人</h3>
			</div>
			<div class="span6 text-right" style="padding-top:15px;">
				<a href="<?php echo $this->createUrl('orgContact/create',array('oid'=>$model->id))?>" class="btn btn-primary btn-small"><i class="icon-plus icon-white"></i>  新建联系人</a>
			</div>
		</div>
		<table class="table">
			<thead>
				<tr>
					<td>#</td>
					<td>姓名</td>
					<td>操作</td>
				</tr>
			</thead>
			<tbody>

			<?php if($contacts):?>
			<?php foreach($contacts as $index=>$c):?>
				<tr>
					<td><?php echo $index+1;?></td>
					<td><a href="<?php echo $this->createUrl('orgContact/view',array('id'=>$c->id))?>"><?php echo $c->name;?></a></td>
					<td>
						<a href="<?php echo $this->createUrl('orgContact/update',array('id'=>$c->id));?>" class="btn btn-primary btn-mini">编辑</a>
					</td>
				</tr>
			<?php endforeach;?>
			<?php endif;?>
			</tbody>
		</table>
	</div>

</div>