<?php
/* @var $this ChildController */
/* @var $data Child */
?>
<tr>
<td>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>
	</td>
	<td><?php echo $data->parent->name;?></td>
	<td>
	<?php echo CHtml::encode($data->contact); ?>
	</td>
 <td width="48%">
 	<a href="<?php echo $this->createUrl('update',array('id'=>$data->id));?>" class="btn">Edit</a>
  <a href="<?php echo $this->createUrl('delete',array('id'=>$data->id));?>" class="btn btn-danger">Delete</a>
  </td>
</tr>