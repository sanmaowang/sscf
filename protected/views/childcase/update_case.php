<?php
$this->breadcrumbs=array(
	'Case'=>array('index'),
	'Update Case Basic Info',
);

$this->menu=array(
	array('label'=>'基本信息'),
	array('label'=>'患儿基本信息','url'=>array('update','id'=>$model->id,'flag'=>'child'),'active'=>$flag == 'child'),
	array('label'=>'家庭直系亲属基本信息','url'=>array('update','id'=>$model->id,'flag'=>'family'),'active'=>$flag == 'family'),
	array('label'=>'其他家庭成员信息','url'=>array('update','id'=>$model->id,'flag'=>'other'),'active'=>$flag == 'other'),
	array('label'=>'病情描述','url'=>array('update','id'=>$model->id,'flag'=>'medical'),'active'=>$flag == 'medical'),
	array('label'=>'手术预算和资助情况','url'=>array('update','id'=>$model->id,'flag'=>'economic'),'active'=>$flag == 'economic'),
	array('label'=>'医疗评估'),
	array('label'=>'医疗评估','url'=>array('update','id'=>$model->id,'flag'=>'chris'),'active'=>$flag == 'chris'),
	array('label'=>'附加材料'),
	array('label'=>'家庭背景','url'=>array('update','id'=>$model->id,'flag'=>'fbg'),'active'=>$flag == 'fbg'),
	array('label'=>'病史','url'=>array('update','id'=>$model->id,'flag'=>'mbg'),'active'=>$flag == 'mbg'),
	array('label'=>'照片','url'=>array('update','id'=>$model->id,'flag'=>'pic'),'active'=>$flag == 'pic'),
	array('label'=>'结案及术后','url'=>array('update','id'=>$model->id,'flag'=>'casesummary'),'active'=>$flag == 'casesummary'),
	array('label'=>'申请表','url'=>array('update','id'=>$model->id,'flag'=>'appfiles'),'active'=>$flag == 'appfiles'),
	array('label'=>'Case管理信息'),
	array('label'=>'案例负责人及状态变更','url'=>array('updatecase','id'=>$model->id,'flag'=>'case'),'active'=>$flag == 'case'),
	array('label'=>'Case Tracking','url'=>array('casetracking','id'=>$model->id,'flag'=>'tracking'),'active'=>$flag == 'tracking'),
);
?>
<div class="page-header">
<h1>案例基本信息/更新</h1>
</div>
<?php echo $this->renderPartial('_simple_form', array('model'=>$model,'users'=>$users,'orgs'=>$orgs)); ?>