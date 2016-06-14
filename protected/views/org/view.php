<?php

$this->breadcrumbs=array(
	'合作机构'=>array('index'),
	$model->name,
);
// if($menu){
// 	$this->breadcrumbs +=array_reverse($menu);
// }
// array_push($this->breadcrumbs,$model->name);
?>
<div class="row-fluid">
		<div class="row-fluid">
			<div class="span6">
				<h3><?php echo $model->name;?></h3>
			</div>
			<div class="span6 text-right" style="padding-top:18px;">
				<a href="<?php echo $this->createUrl('update',array('id'=>$model->id))?>" class="btn btn-info btn-small"><i class="icon-edit icon-white"></i>  编辑客户</a>
			</div>
		</div>
		<div class="row-fluid">
			<span><?php echo $model->english_name;?>  <?php echo $model->official_name;?>  <?php if($model->website){?><a href="<?php echo $model->website;?>" target="_blank" class="label label-info">官网</a><?php }?></span>
		</div>
	<div class="row-fluid">
			<div class="span6">
				<h3>工作人员</h3>
			</div>
			<div class="span6 text-right" style="padding-top:15px;">
				<a href="<?php echo $this->createUrl('orgContact/create',array('oid'=>$model->id))?>" class="btn btn-primary btn-small"><i class="icon-plus icon-white"></i>  新建工作人员</a>
			</div>
		</div>
		<table class="table">
			<thead>
				<tr>
					<td>#</td>
					<td>姓名</td>
					<td>部门</td>
					<td>职务</td>
					<td>电话</td>
					<td>操作</td>
				</tr>
			</thead>
			<tbody>

			<?php if($contacts):?>
			<?php foreach($contacts as $index=>$c):?>
				<tr>
					<td><?php echo $index+1;?></td>
					<td><a href="<?php echo $this->createUrl('orgcontact/view',array('id'=>$c->id))?>"><?php echo $c->name;?></a></td>
					<td><?php echo $c->department;?></td>
					<td><?php echo $c->job;?></td>
					<td><?php echo $c->mobile;?></td>
					<td>
						<a href="<?php echo $this->createUrl('orgcontact/update',array('id'=>$c->id));?>" class="btn btn-info btn-mini">编辑</a>
							<?php echo CHtml::ajaxLink('删除',array('orgcontact/delete','id'=>$c->id),
                  array('type'=>'POST','success'=>'function(data){var d = $.parseJSON(data);var _id = d.id;$("#delete-"+_id+"").parent().parent().remove();}'),
                  array('confirm'=>'该操作不可逆，确定要删除吗?',
                        'id'=>'delete-'.$c->id,
                        'class'=>'btn btn-mini btn-danger')); ?>
					</td>
				</tr>
			<?php endforeach;?>
			<?php endif;?>
			</tbody>
		</table>
	</div>

