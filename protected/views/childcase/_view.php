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
	<td><?php if($data->sourcefrom) echo $data->sourcefrom->name;?></td>
	<td><?php echo $data->getStatusLabel();?></td>
	<td><a href="<?php echo $this->createUrl('user/view',array('id'=>$data->createby->id));?>"><?php echo $data->createby->name;?></a></td>
  <td width="18%">
 	<a href="<?php echo $this->createUrl('update',array('id'=>$data->id,'flag'=>'child'));?>" class="btn"><i class="fa fa-edit"></i> Edit</a>
 	 <?php echo CHtml::ajaxLink('<i class="icon-trash icon-white"></i> Delete',array('delete','id'=>$data->id),
                  array('type'=>'POST','success'=>'function(data){var d = $.parseJSON(data);var _id = d.id;$("#delete-"+_id+"").parent().parent().remove();}'),
                  array('confirm'=>'该操作不可逆，确定要删除吗?',
                        'id'=>'delete-'.$data->id,
                        'class'=>'btn btn-danger')); ?>
  </td>
</tr>