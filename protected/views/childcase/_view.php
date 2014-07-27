<?php
/* @var $this ChildController */
/* @var $data Child */
?>
<tr>
<td><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	</td>
<td>
	<strong><?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?></strong><br>
    <span style="color:#999;font-size:12px;">Updated: <strong><?php echo CHtml::encode($data->update_time); ?></strong></span>
	</td>
	<td><?php echo $data->sourcefrom->name;?></td>
	<td><?php if($data->status == 0){echo "<span class='label'>新建</span>";}
	elseif($data->status == 1){ echo "<span class='label label-warning'>等待资助</span>";}
	elseif($data->status == 2){ echo "<span class='label label-success'>确认资助</span>";}
	elseif($data->status == 3){ echo "<span class='label label-warning'>不资助</span>";}
	?></td>
	<td><?php echo $data->createby->name;?></td>
 <td width="38%">
 	<a href="<?php echo $this->createUrl('view',array('id'=>$data->id));?>" class="btn"><i class="fa fa-user"></i> View</a>
 	<a href="<?php echo $this->createUrl('updatecase',array('id'=>$data->id));?>" class="btn"><i class="fa fa-file"></i> Edit Basic</a>
 	<a href="<?php echo $this->createUrl('update',array('id'=>$data->id,'flag'=>'child'));?>" class="btn"><i class="fa fa-edit"></i> Edit DC Memo</a>
 	 <?php echo CHtml::ajaxLink('<i class="icon-trash icon-white"></i> Delete',array('delete','id'=>$data->id),
                  array('type'=>'POST','success'=>'function(data){var d = $.parseJSON(data);var _id = d.id;$("#delete-"+_id+"").parent().parent().remove();}'),
                  array('confirm'=>'该操作不可逆，确定要删除吗?',
                        'id'=>'delete-'.$data->id,
                        'class'=>'btn btn-danger')); ?>
  </td>
</tr>