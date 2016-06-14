<?php
/* @var $this MedicalInfoController */
/* @var $model MedicalInfo */

$this->breadcrumbs=array(
	'案例'=>array('childcase/index'),
	'手术预算和资助情况'=>array('childcase/update','id'=>$model->case_id,'flag'=>'chris'),
	'更新医生评价',
);

$this->menu=array(
	array('label'=>'List MedicalInfo', 'url'=>array('index')),
	array('label'=>'Manage MedicalInfo', 'url'=>array('admin')),
);
?>
<div class="page-header">
<h2>更新 医学评估 医疗报告</h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model,'files'=>$files,'folder'=>$folder)); ?>