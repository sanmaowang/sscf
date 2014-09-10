<?php
$this->breadcrumbs=array(
	'捐赠者'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
  array('label'=>'Operation'),
  array('label'=>'Donors','icon'=>'user', 'url'=>array('donor/index'),'active'=>true),
  array('label'=>'Receipts','icon'=>'file', 'url'=>array('receipt/list')),
);
?>
<div class="page-header">
<h1>Update Donor <?php echo $model->id; ?></h1>
</div>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>