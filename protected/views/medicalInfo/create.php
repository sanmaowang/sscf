<?php
/* @var $this MedicalInfoController */
/* @var $model MedicalInfo */

$this->breadcrumbs=array(
	'案例'=>array('childcase/index'),
	'手术预算和资助情况'=>array('childcase/update','id'=>$_GET['id'],'flag'=>'chris'),
	'创建医生评价',
);

$this->menu=array(
	array('label'=>'List MedicalInfo', 'url'=>array('index')),
	array('label'=>'Manage MedicalInfo', 'url'=>array('admin')),
);
?>
<div class="page-header">
<h2>创建 医生评价 报告</h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model,'files'=>$files,'folder'=>$folder)); ?>