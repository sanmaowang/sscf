<?php
/* @var $this ChildController */
/* @var $model Child */

$this->breadcrumbs=array(
	'患儿案例'=>array('index'),
	'创建',
);
?>
<div class="page-header">
<h2>创建患儿案例</h2>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>