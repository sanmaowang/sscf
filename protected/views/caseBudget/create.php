<?php
$this->breadcrumbs=array(
	'案例'=>array('childcase/index'),
	'手术预算和资助情况'=>array('childcase/update','id'=>$_GET['case_id'],'flag'=>'economic'),
	'添加数据'
);


?>
<div class="page-header">
<h1>添加数据</h1>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model,'orgs'=>$orgs)); ?>