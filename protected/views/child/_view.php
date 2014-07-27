<?php
/* @var $this ChildController */
/* @var $data Child */
?>
<tr>
<td><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	</td>
<td>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>
	</td>
	<td></td>
	<td></td>
	<td></td>
 <td><a href="<?php echo $this->createUrl('campaign/view',array('id'=>$data->id));?>" class="btn btn-primary">案例</a>
  <a href="<?php echo $this->createUrl('campaign/update',array('id'=>$data->id));?>" class="btn">编辑</a>
  </td>
</tr>