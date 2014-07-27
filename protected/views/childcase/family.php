<?php
$this->breadcrumbs=array(
	'Childcases'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'DC MEMO'),
	array('label'=>'患儿基本信息','url'=>array('update','id'=>$model->id,'flag'=>'child'),'active'=>$flag == 'child'),
	array('label'=>'家庭直系亲属基本信息','url'=>array('family','id'=>$model->id,'flag'=>'family'),'active'=>$flag == 'family'),
	array('label'=>'其他家庭成员信息','url'=>array('family','id'=>$model->id,'flag'=>'other'),'active'=>$flag == 'other'),
	array('label'=>'病情描述','url'=>array('update','id'=>$model->id,'flag'=>'medical'),'active'=>$flag == 'medical'),
	array('label'=>'手术预算和经济情况说明','url'=>array('update','id'=>$model->id,'flag'=>'economic'),'active'=>$flag == 'economic'),
	array('label'=>'Medical Assessment'),
	array('label'=>'Family background','url'=>array('update','id'=>$model->id,'flag'=>'fbg'),'active'=>$flag == 'fbg'),
	array('label'=>'Pictures','url'=>array('update','id'=>$model->id,'flag'=>'pic'),'active'=>$flag == 'pic'),
	array('label'=>'Medical Background','url'=>array('update','id'=>$model->id,'flag'=>'mbg'),'active'=>$flag == 'mbg'),
	array('label'=>'Case Summary and Post-Surgery','url'=>array('update','id'=>$model->id,'flag'=>'casesummary'),'active'=>$flag == 'casesummary'),
	array('label'=>'Application files','url'=>array('update','id'=>$model->id,'flag'=>'appfiles'),'active'=>$flag == 'appfiles'),
);
$template = 'memo/'.$flag;
?>
<h1>编辑 <?php echo $model->name; ?> 案例</h1>
<?php echo $this->renderPartial($template,array('model'=>$model,'fmodel'=>$fmodel,'flag'=>$flag)); ?>