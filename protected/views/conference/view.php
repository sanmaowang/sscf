<?php
$this->breadcrumbs=array(
	'会议'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Conference'),
	array('label'=>'正在进行的会议','url'=>array('index')),
	array('label'=>'已结束的会议','url'=>array('index?archive=1')),
	array('label'=>'Manage'),
	array('label'=>'会议管理','url'=>array('admin')),
);
?>
<div class="page-header">
<h1>查看会议记录</h1>
<h4>#<?php echo $model->name; ?></h4>
</div>
<div class="control-group">
	<h4 for="" class="control-label">纪要</h4>
	<div class="controls">
		<pre>
		<?php echo $model->summary;?>
		</pre>
	</div>
</div>
	<hr>
<div class="control-group">
		<h5 for="" class="control-label">参会成员</h5>
		<div id="attendant" class="controls">
			<?php if(count($attendant)>0){ foreach ($attendant as $key => $a) {?>
				<a class="label label-success label-choose" href="#" data-id="<?php echo $a->user->id?>"><i class="icon icon-ok icon-white"></i>	<?php echo $a->user->name;?></a>
				<input type="hidden" name="ConferenceAttendance[<?php echo $a->id;?>]" id="attendance_user_<?php echo $a->user->id;?>" value="1">
			<?php }}?>
		</div>
	</div>
	<div class="control-group">
		<h5 for="" class="control-label">缺勤成员</h5>
		<div id="absence" class="controls">
			<?php if(count($absence)>0){ foreach ($absence as $key => $a) {?>
				<a class="label label label-cancel" href="#" data-id="<?php echo $a->user->id?>"><?php echo $a->user->name;?></a>
				<input type="hidden" name="ConferenceAttendance[<?php echo $a->id;?>]" id="attendance_user_<?php echo $a->user->id;?>" value="0">
			<?php }}?>
		</div>
	</div>
