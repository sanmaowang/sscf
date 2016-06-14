<?php
$this->breadcrumbs=array(
	'案例'=>array('childcase/index'),
	$model->case->name=>array('childcase/update','id'=>$model->case_id,'flag'=>'economic'),
	'更新账单',
);

?>
<div class="page-header">
<h1>更新账单</h1>
</div>
<?php echo $this->renderPartial('_form',array('model'=>$model,'orgs'=>$orgs,'first'=>$first)); ?>