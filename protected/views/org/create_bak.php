<?php
$this->breadcrumbs=array(
	'Orgs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OtherOrg','url'=>array('index')),
	array('label'=>'Manage OtherOrg','url'=>array('admin')),
);
function display_tree($arr){
	echo "<ul>";
	foreach ($arr as $org) {
		$num = count($org->childs);
		$str = $num>0?'('.$num.')':'';
		echo '<li data-id='.$org->id.'><a href="#" class="item"><i class="icon-folder-close"></i> '.$org->name.$str.'</a><a class="op add" href="'.Yii::app()->createUrl('org/create',array('pid'=>$org->id)).'">Add Child</a><a class="op add" href="'.Yii::app()->createUrl('org/update',array('id'=>$org->id)).'">Edit </a><a class="op delete"  href="'.Yii::app()->createUrl('delete',array('id'=>$org->id)).'">Delete</a>';
		if($num > 0){
			display_tree($org->childs);
		}
		echo '</li>';
	}
	echo "</ul>";
}
?>
<div class="page-header">
<h1>新建机构</h1>
</div>
<div class="row-fluid">
	<div class="span6">
		<?php echo $this->renderPartial('_form', array('model'=>$model,'all'=>$all)); ?>
	</div>
	<div class="span6">
		<div class="tree">
			<a class="op"  href="<?php echo $this->createUrl('create',array('pid'=>0));?>">Add Parent</a>
			<?php 
				display_tree($orgs);
			?>
		</div>
	</div>
</div>


<?php
    $baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerScriptFile($baseUrl."/js/vendor/jquery-1.9.1.min.js");
		$cs->registerScript('tree', "
    	$(function () {
		    $('.tree li').hide();
		    $('.tree ul li').not('ul li ul li').show();
		    $('.tree .item').on('click', function (e) {
		        var children = $(this).parent().find('> ul > li');
		        if (children.is(':visible')) children.hide('fast');
		        else children.show('fast');
		        e.stopPropagation();
		    });
		});
		", CClientScript::POS_END);
?>