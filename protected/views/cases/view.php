<?php
$this->breadcrumbs=array(
	'Cases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Cases','url'=>array('index')),
	array('label'=>'Create Cases','url'=>array('create')),
	array('label'=>'Update Cases','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Cases','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cases','url'=>array('admin')),
);
?>

<h1>View Cases #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'child_id',
		'state_desc',
		'medical_insurance_rate',
		'other_subsidy',
		'have_other_illness',
		'have_pneumonia',
		'operation_hospital',
		'doctor',
		'is_one_time_cure',
		'admission_time',
		'operation_plan_time',
		'other_foundation_staff',
		'staff',
		'applicant',
		'status',
		'create_time',
		'update_time',
	),
)); ?>
