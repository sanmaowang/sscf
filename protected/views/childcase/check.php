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
	系统自动检查部分属性. <br> 请告诉我哪些是提交审核所必须需要的资料，请精确到字段级别。例如下面未完成项目：
</div>
<h4>资料完成率:</h4>
<div class="progress progress-striped">
   <div class="bar" style="width:0%">
   </div>
</div>
<h4>未完成项目:</h4>
<ul class="unfinish">
	<?php foreach ($errors as $error) {?>
	<li class="text-error hide"><?php echo $error;?> <a href="#"><i class="icon-edit"></i></a></li>
	<?php }?>
</ul>
<div class="form-actions text-center">
	<a href="#" class="btn btn-success disabled">提交审核</a>
</div>

<script>
	function showUn(obj){
  		var next = $(obj).next();
  		obj.show(100,function(){
  			if(next){
  				showUn(next);
  			}
  		});
	}
  $(function () {
  	var bar = $(".bar");
  	var rate = <?php echo $rate;?>;
  	var unfinish = $(".unfinish li").eq(0);
  	showUn(unfinish);

  	if(rate){
  		var f = 0;
  		var progress = setInterval(function(){
  			if(f >= parseInt(rate)){
  				clearInterval(progress);
  			}else{
  				f += 1;
  				bar.css("width",f+"%");
  			}
  			bar.text(f+"%");
  		},200);
  	}

  })
</script>

