<?php
$this->breadcrumbs=array(
	'案例'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'基本信息'),
	array('label'=>'患儿基本信息','url'=>array('update','id'=>$model->id,'flag'=>'child'),'active'=>$flag == 'child'),
	array('label'=>'家庭直系亲属基本信息','url'=>array('update','id'=>$model->id,'flag'=>'family'),'active'=>$flag == 'family'),
	array('label'=>'其他家庭成员信息','url'=>array('update','id'=>$model->id,'flag'=>'other'),'active'=>$flag == 'other'),
	array('label'=>'病情描述','url'=>array('update','id'=>$model->id,'flag'=>'medical'),'active'=>$flag == 'medical'),
	array('label'=>'手术预算和资助情况','url'=>array('update','id'=>$model->id,'flag'=>'economic'),'active'=>$flag == 'economic'),
	array('label'=>'附加材料'),
	array('label'=>'家庭背景','url'=>array('update','id'=>$model->id,'flag'=>'fbg'),'active'=>$flag == 'fbg'),
	array('label'=>'病史','url'=>array('update','id'=>$model->id,'flag'=>'mbg'),'active'=>$flag == 'mbg'),
	array('label'=>'照片','url'=>array('update','id'=>$model->id,'flag'=>'pic'),'active'=>$flag == 'pic'),
	array('label'=>'结案及术后','url'=>array('update','id'=>$model->id,'flag'=>'casesummary'),'active'=>$flag == 'casesummary'),
	array('label'=>'申请表','url'=>array('update','id'=>$model->id,'flag'=>'appfiles'),'active'=>$flag == 'appfiles'),
	array('label'=>'Case负责人信息'),
	array('label'=>'案例负责人','url'=>array('updatecase','id'=>$model->id,'flag'=>'case'),'active'=>$flag == 'case'),
);
$template = 'memo/'.$flag;
$data = array('model'=>$model);
if($flag == 'family' || $flag == 'other'){
	$data = array('model'=>$model,'fmodel'=>$fmodel);
}elseif($flag == 'fbg' || $flag == 'pic'|| $flag == 'mbg'|| $flag == 'casesummary'|| $flag == 'appfiles'){
	$template = 'files/files';
	$data = array('model'=>$model,'amodel'=>$amodel,'flag'=>$flag);
}elseif($flag == "economic"){
	$data = array('model'=>$model,'bmodel'=>$bmodel,'orgs'=>$orgs);
}


?>
<h1>编辑 <?php echo $model->name; ?> 案例</h1>

<?php 
 echo $this->renderPartial($template,$data);
?>