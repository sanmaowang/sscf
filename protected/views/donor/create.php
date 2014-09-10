<?php
$this->breadcrumbs=array(
	'捐赠者'=>array('index'),
	'Create',
);

$this->menu=array(
  array('label'=>'Operation'),
  array('label'=>'Donors','icon'=>'user', 'url'=>array('donor/index'),'active'=>true),
  array('label'=>'Receipts','icon'=>'file', 'url'=>array('receipt/list')),
);
?>
<h1>Create Donor</h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>