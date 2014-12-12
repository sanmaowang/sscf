<?php
$this->breadcrumbs=array(
	'合作机构'=>array('org/index'),
	$org->name => array('org/view','id'=>$org->id),
	'新建联系人'
);
// if($menu){
// 	$this->breadcrumbs +=array_reverse($menu);
// }
// array_push($this->breadcrumbs,'新建联系人');

?>
<div class="page-header">
<h1>新建联系人</h1>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model,'org'=>$org)); ?>