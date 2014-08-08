<?php
$this->breadcrumbs=array(
	'合作机构'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OtherOrg','url'=>array('index')),
	array('label'=>'Manage OtherOrg','url'=>array('admin')),
);

?>
<div class="page-header">
<h1><?php if($parent):?>
		<?php echo $parent->name;?> - 
		<?php endif;?> 新建机构</h1>
</div>
<div class="row-fluid">
	<div class="span12">
		<?php echo $this->renderPartial('_form', array('model'=>$model,'parent_id'=>$parent_id)); ?>
	</div>
</div>
