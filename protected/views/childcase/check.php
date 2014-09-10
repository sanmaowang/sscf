<?php
/* @var $this ChildcaseController */
/* @var $model Childcase */

$this->breadcrumbs=array(
	'案例'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'审核',
);

$this->menu=array(
	array('label'=>'List Childcase', 'url'=>array('index')),
	array('label'=>'Create Childcase', 'url'=>array('create')),
	array('label'=>'Update Childcase', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Childcase', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Childcase', 'url'=>array('admin')),
);
$topics = array("fbg","pic","mbg","casesummary","appfiles");
$img_exts = array("jpg","png","bmp","jpeg","gif");
      $excel_exts = array("xls","xlsx");
      $word_exts = array("doc","docx");
      $folder_type = array("under review","under review","under review","funded","passed");

?>
<div class="page-header row-fluid" style="border:none;margin-bottom:10px;">
	<div class="span6">
<h2>提交审核 <?php echo $model->name; ?> </h2>
<p class="muted"><span>海星尽职调查专员: <?php if($model->charge) echo CHtml::encode($model->charge->name); ?></span> <span style="margin-left:30px;">其他基金会牵头人: <?php if($model->other_foundation_staff){ echo CHtml::encode($model->other_foundation_staff);} else{ echo "暂无登记";}; ?></span></p>
</div>
</div>
<div class="alert">
	It's a Demo show, plz tell me the process.
</div>
<h4>资料完成率:</h4>
<div class="progress progress-striped">
   <div class="bar" style="width: 20%">
   	20%
   </div>
</div>
<h4>未完成项目:</h4>
<ul>
	<li class="text-error">[DC MEMO] 【出生日期】 缺失</li>
	<li class="text-error">[DC MEMO] 【身份证】 缺失</li>
	<li class="text-error">[Family Background] 缺失</li>
	<li class="text-error">[Medical Background] 缺失</li>
</ul>
<div class="form-actions text-center">
	<a href="#" class="btn btn-success disabled">提交审核</a>
</div>


<?php
    $baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCssFile($baseUrl."/js/vendor/colorbox/colorbox.css");
    $cs->registerScriptFile($baseUrl.'/js/vendor/colorbox/jquery.colorbox-min.js',CClientScript::POS_END);
    $cs->registerScript('update-detail', '
    $(function(){
      $(".files").colorbox({ innerWidth:500});
    })', CClientScript::POS_END);
?>


<script>
  $(function () {
    $('#child_info a').click(function (e) {
		  e.preventDefault();
		  $(this).tab('show');
		})
  })
</script>

