<?php 

$o = array();

foreach ($orgs as $org) {
	$o[$org->id] = $org->name;
}

$fees = $model->budget;
$budget = array();
$cost = array();

$total_cost;
$total_hospital_cost;
$total_budget;
$total_hospital_budget;
$last_date = null;

foreach ($fees as $fee) {
	if($fee->fee_type == 0){
		if($fee->type == 'hospital_budget'){
			$budget['hospital'][] = $fee;
			$total_hospital_budget += $fee->amount;
		}else if($fee->type == 'our_budget'){
			$budget['our'][] = $fee;
			$total_budget += $fee->amount;
		  $last_date = $fee->last_date?$fee->last_date:$last_date;
		}else if($fee->type == 'org_budget'){
			$budget['org'][] = $fee;
			$total_budget += $fee->amount;
		  $last_date = $fee->last_date?$fee->last_date:$last_date;
		}
	}else if($fee->fee_type == 1){
		if($fee->type == 'hospital_cost'){
			$cost['hospital'][] = $fee;
			$total_hospital_cost += $fee->amount;
		}else if($fee->type == 'our_cost'){
			$cost['our'][] = $fee;
			$total_cost += $fee->amount;
		}else if($fee->type == 'org_cost'){
			$cost['org'][] = $fee;
			$total_cost += $fee->amount;
		}
	}
}


$rest_budget = $total_hospital_budget - $total_budget;

$rest_cost =  $total_cost - $total_hospital_cost;

?>
<legend>预算表</legend>
<table class="table table-bordered personal-tb">
	<thead>
	<tr>
		<th>医院</th>
		<th>数额</th>
		<th>备注</th>
		<th>预算日期</th>
		<th>操作</th>
	</tr>
	</thead>
	<tbody>
		<?php if(isset($budget['hospital']) && count($budget['hospital']) > 0 ){?>
		<?php foreach ($budget['hospital'] as $b) {?>
		<tr class="warning">
			<td>
				<?php echo $o[$b->source];?>
			</td>
			<td class="text-error">
				<?php echo $b->amount;?> 元
			</td>
			<td>
				<?php echo $b->note;?>
			</td>
			<td>
				<?php echo substr($b->last_date,0,10);?>
			</td>
			<td>
				<a href="<?php echo $this->createUrl('caseBudget/update',array('id'=>$b->id,'flag'=>'economic'));?>"><i class="icon icon-edit"></i></a>
          	<?php echo CHtml::ajaxLink('<i class="icon icon-trash"></i>',array('caseBudget/delete','id'=>$b->id),
                  array('type'=>'POST','success'=>'function(data){var d = $.parseJSON(data);var _id = d.id;$("#delete-"+_id+"").parent().parent().remove();}'),
                  array('confirm'=>'该操作不可逆，确定要删除吗?',
                        'id'=>'delete-'.$b->id,
                        )); ?>
			</td>
		</tr>
		<?php }}else{?>
		<tr class="warning">
			<td colspan="5">
				<i class="icon icon-plus"></i><a href="<?php echo $this->createUrl('caseBudget/create',array('case_id'=>$model->id,'fee_type'=>'0','type'=>'hospital_budget'));?>">请填写医院预算</a>
			</td>
		</tr>
		<?php }?>
	</tbody>
	<thead>
	<tr>
		<th>机构</th>
		<th>数额</th>
		<th>备注</th>
		<th>截至 <?php echo substr($last_date, 0,10);?></th>
		<th>操作</th>
	</tr>
	</thead>
	<tbody>
		<?php if(isset($budget['org']) && count($budget['org']) > 0 ){?>
		<?php foreach ($budget['org'] as $b) {?>
		<tr>
			<td>
				<?php echo $o[$b->source];?> 
			</td>
			<td class="text-info">
				<?php echo $b->amount;?> 元
			</td>
			<td>
				<?php echo $b->note;?>
			</td>
			<td>
			</td>
			<td>
				<a href="<?php echo $this->createUrl('caseBudget/update',array('id'=>$b->id,'flag'=>'economic'));?>"><i class="icon icon-edit"></i></a>
          	<?php echo CHtml::ajaxLink('<i class="icon icon-trash"></i>',array('caseBudget/delete','id'=>$b->id),
                  array('type'=>'POST','success'=>'function(data){var d = $.parseJSON(data);var _id = d.id;$("#delete-"+_id+"").parent().parent().remove();}'),
                  array('confirm'=>'该操作不可逆，确定要删除吗?',
                        'id'=>'delete-'.$b->id,
                        )); ?>
			</td>
		</tr>
		<?php }}?>
		<?php if(isset($budget['our']) && count($budget['our']) > 0 ){?>
		<?php foreach ($budget['our'] as $b) {?>
		<tr>
			<td>
				<?php if($b->source == 0){echo "海星意向";}else{ echo $o[$b->source];}?>
			</td>
			<td class="text-info">
				<?php echo $b->amount;?> 元
			</td>
			<td>
				<?php echo $b->note;?>
			</td>
			<td>
			</td>
			<td>
				<a href="<?php echo $this->createUrl('caseBudget/update',array('id'=>$b->id,'flag'=>'economic'));?>"><i class="icon icon-edit"></i></a>
          	<?php echo CHtml::ajaxLink('<i class="icon icon-trash"></i>',array('caseBudget/delete','id'=>$b->id),
                  array('type'=>'POST','success'=>'function(data){var d = $.parseJSON(data);var _id = d.id;$("#delete-"+_id+"").parent().parent().remove();}'),
                  array('confirm'=>'该操作不可逆，确定要删除吗?',
                        'id'=>'delete-'.$b->id,
                        )); ?>
			</td>
		</tr>
		<?php }}?>
		<tr>
			<td colspan="5"><i class="icon icon-plus"></i>
				<?php if(count($budget['our']) > 0 || count($budget['org']) > 0 ){?>
				<a href="<?php echo $this->createUrl('caseBudget/create',array('case_id'=>$model->id,'fee_type'=>'0'));?>">添加预算数据</a>
				<?php }else{?>
				<a href="<?php echo $this->createUrl('caseBudget/create',array('case_id'=>$model->id,'fee_type'=>'0','first'=>'1'));?>">添加预算数据</a>
			<?php }?>
			</td>
		</tr>
		<tr class="error">
			<td colspan="5" class="text-error">
				最终缺口：<?php echo $rest_budget;?> 元
			</td>
		</tr>
	</tbody>
</table>
<hr>
<legend>结案表</legend>
<table class="table table-bordered personal-tb">
	<thead>
	<tr>
		<th>医院</th>
		<th>数额</th>
		<th>备注</th>
		<th>结账日期</th>
		<th>操作</th>
	</tr>
	</thead>
	<tbody>
		<?php if(isset($cost['hospital']) && count($cost['hospital']) > 0 ){?>
		<?php foreach ($cost['hospital'] as $b) {?>
		<tr class="warning">
			<td>
				<?php echo $o[$b->source];?>
			</td>
			<td class="text-error">
				<?php echo $b->amount;?> 元
			</td>
			<td>
				<?php echo $b->note;?>
			</td>
			<td>
				<?php echo substr($b->last_date,0,10);?>
			</td>
			<td>
				<a href="<?php echo $this->createUrl('caseBudget/update',array('id'=>$b->id,'flag'=>'economic'));?>"><i class="icon icon-edit"></i></a>
          	<?php echo CHtml::ajaxLink('<i class="icon icon-trash"></i>',array('caseBudget/delete','id'=>$b->id),
                  array('type'=>'POST','success'=>'function(data){var d = $.parseJSON(data);var _id = d.id;$("#delete-"+_id+"").parent().parent().remove();}'),
                  array('confirm'=>'该操作不可逆，确定要删除吗?',
                        'id'=>'delete-'.$b->id,
                        )); ?>
			</td>
		</tr>
		<?php }}else{?>
		<tr class="warning">
			<td colspan="5">
				<i class="icon icon-plus"></i> <a href="<?php echo $this->createUrl('caseBudget/create',array('case_id'=>$model->id,'fee_type'=>'1','type'=>'hospital_cost'));?>">请填写</a>
			</td>
		</tr>
		<?php }?>
	</tbody>
	<thead>
	<tr>
		<th>机构</th>
		<th>数额</th>
		<th>备注</th>
		<th></th>
		<th>操作</th>
	</tr>
	</thead>
	<tbody>
		<?php if(isset($cost['org']) && count($cost['org']) > 0 ){?>
		<?php foreach ($cost['org'] as $b) {?>
		<tr>
			<td>
				<?php echo $o[$b->source];?>
			</td>
			<td class="text-success">
				<?php echo $b->amount;?> 元
			</td>
			<td>
				<?php echo $b->note;?>
			</td>
			<td>
			</td>
			<td>
				<a href="<?php echo $this->createUrl('caseBudget/update',array('id'=>$b->id,'flag'=>'economic'));?>"><i class="icon icon-edit"></i></a>
          	<?php echo CHtml::ajaxLink('<i class="icon icon-trash"></i>',array('caseBudget/delete','id'=>$b->id),
                  array('type'=>'POST','success'=>'function(data){var d = $.parseJSON(data);var _id = d.id;$("#delete-"+_id+"").parent().parent().remove();}'),
                  array('confirm'=>'该操作不可逆，确定要删除吗?',
                        'id'=>'delete-'.$b->id,
                        )); ?>
			</td>
		</tr>
		<?php }}?>
		<?php if(isset($cost['our']) && count($cost['our']) > 0 ){?>
		<?php foreach ($cost['our'] as $b) {?>
		<tr>
			<td>
				<?php if($b->source == 0){echo "海星资助";}else{ echo $o[$b->source];}?>
			</td>
			<td class="text-success">
				<?php echo $b->amount;?> 元
			</td>
			<td>
				<?php echo $b->note;?>
			</td>
			<td>
			</td>
			<td>
				<a href="<?php echo $this->createUrl('caseBudget/update',array('id'=>$b->id,'flag'=>'economic'));?>"><i class="icon icon-edit"></i></a>
          	<?php echo CHtml::ajaxLink('<i class="icon icon-trash"></i>',array('caseBudget/delete','id'=>$b->id),
                  array('type'=>'POST','success'=>'function(data){var d = $.parseJSON(data);var _id = d.id;$("#delete-"+_id+"").parent().parent().remove();}'),
                  array('confirm'=>'该操作不可逆，确定要删除吗?',
                        'id'=>'delete-'.$b->id,
                        )); ?>
			</td>
		</tr>
		<?php }}?>
		<tr>
			<td colspan="5">
				<i class="icon icon-plus"></i> <a href="<?php echo $this->createUrl('caseBudget/create',array('case_id'=>$model->id,'fee_type'=>'1'));?>">添加结款数据</a>
			</td>
		</tr>
		<tr class="success">
			<td colspan="5" class="text-success">
				结款总额：<?php echo $rest_cost;?> 元
			</td>
		</tr>
	</tbody>
</table>

