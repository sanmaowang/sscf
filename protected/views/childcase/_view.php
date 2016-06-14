<?php
/* @var $this ChildController */
/* @var $data Child */
?>
<tr>
	<td><?php echo 'S'.sprintf("%04d", $data->id);?></td>
<td>
	<strong><?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?></strong><br>
    <span style="color:#999;font-size:12px;">Updated: <strong><?php echo CHtml::encode($data->update_time); ?></strong></span>
	</td>
	<td><?php if($data->sourcefrom) echo $data->sourcefrom->name;?></td>
	<td><?php echo $data->getStatusLabel();?>
	<?php if($data->status == 3 && $data->kid != ""){echo "<p class='text-success'>".$data->kid."F</p>";}?>
	</td>
	<td><a href="<?php echo $this->createUrl('user/view',array('id'=>$data->createby->id));?>"><?php echo $data->createby->name;?></a></td>
  <td width="18%">
 	<a href="<?php echo $this->createUrl('update',array('id'=>$data->id,'flag'=>'child'));?>" class="btn"><i class="fa fa-edit"></i> Edit</a>
  <a href="<?php echo $this->createUrl('delete',array('id'=>$data->id,'flag'=>'child'));?>" class="btn btn-danger delete-btn"><i class="icon-trash icon-white"></i> Delete</a>
  </td>
</tr>