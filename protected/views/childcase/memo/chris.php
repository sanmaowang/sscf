<div class="text-right">
<div class="btn-group">
  <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">添加报告 <span class="caret"></span></button>
  <ul class="dropdown-menu text-left">
    <li><a href="<?php echo $this->createUrl('medicalInfo/create',array('id'=>$model->id,'type'=>'mbg_echocardiography'));?>">心脏彩超（超声心动）报告</a></li>
    <li><a href="<?php echo $this->createUrl('medicalInfo/create',array('id'=>$model->id,'type'=>'mbg_IV'));?>">导管诊断报告（如做导管）</a></li>
    <li><a href="<?php echo $this->createUrl('medicalInfo/create',array('id'=>$model->id,'type'=>'mbg_X_Ray'));?>">胸部X光片报告（有肺炎记录）</a></li>
    <li><a href="<?php echo $this->createUrl('medicalInfo/create',array('id'=>$model->id,'type'=>'mbg_CT_Directed'));?>">CT引导穿刺</a></li>
    <li><a href="<?php echo $this->createUrl('medicalInfo/create',array('id'=>$model->id,'type'=>'mbg_3D_Echocardiography'));?>">三维心超图、心电图</a></li>
  </ul>
</div>
<a href="#" class="btn btn-info">报告录入完毕，通知Chris</a>
</div>
<legend>医疗评估</legend>
<?php 
if(count($model->medicalinfo) >0){
   foreach ($model->medicalinfo as $key => $medical) {
?>
	<h3><?php echo $medical->title?></h3>
	<p><?php echo $medical->content?></p>
	<br>
	<div class="row-fluid">
		<div class="span6 text-left text-small muted">
			Update: <?php echo $medical->update_datetime;?>
		</div>
		<div class="text-right">
			<a href="<?php echo $this->createUrl('medicalinfo/update',array('id'=>$medical->id))?>" class="btn btn-mini">修改报告</a>
		</div>
	</div>
	<hr>
<?php
   }}
?>
