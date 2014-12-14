<?php
/* @var $this ChildController */
/* @var $data Child */
?>
<tr>
	<td><?php echo $data->id;?></td>
<td>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>
	</td>
	<td>
		<?php echo $data->types[$data->type];?>
	</td>
	<td>
	<?php echo CHtml::encode($data->contact); ?>
	</td>
 <td width="48%">
 	<a href="<?php echo $this->createUrl('update',array('id'=>$data->id));?>" class="btn"><i class="icon-edit"></i> Edit</a>
 	<?php echo CHtml::ajaxLink('<i class="icon-trash icon-white"></i> Delete',array('delete','id'=>$data->id),
                  array('type'=>'POST','success'=>'function(data){var d = $.parseJSON(data);var _id = d.id;$("#delete-"+_id+"").parent().parent().remove();}'),
                  array('confirm'=>'该操作不可逆，确定要删除吗?',
                        'id'=>'delete-'.$data->id,
                        'class'=>'btn btn-danger')); ?>
  </td>
</tr>