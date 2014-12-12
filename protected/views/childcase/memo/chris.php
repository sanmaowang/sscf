<legend>医疗评估</legend>

<?php 
if(count($model->medicalinfo) >0){
   foreach ($model->medicalinfo as $key => $medical) {
?>
	<h3><?php echo $medical->title?></h3>
	<p><?php echo $medical->content?></p>
	<hr>
	<div class="row-fluid">
		<div class="span6 text-left text-small muted">
			Update: <?php echo $medical->update_datetime;?>
		</div>
		<div class="text-right">
			<a href="<?php echo $this->createUrl('medicalinfo/update',array('id'=>$medical->id))?>" class="btn btn-mini">修改报告</a>
		</div>
	</div>
<?php
   }}
?>
<br>
<div class="row-fluid">
	<a href='<?php echo $this->createUrl('medicalinfo/create',array('id'=>$model->id));?>' class="btn btn-primary">添加报告</a>
<a href="#" class="btn btn-info">报告录入完毕，提醒Chris</a>
</div>