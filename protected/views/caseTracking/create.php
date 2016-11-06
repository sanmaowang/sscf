<?php
$this->breadcrumbs=array(
	'Case Trackings'=>array('index'),
	'Create',
);
?>
<div class="page-header">
<h1>Create CaseTracking</h1>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>