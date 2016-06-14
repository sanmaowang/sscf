<?php
/* @var $this MedicalInfoController */
/* @var $model MedicalInfo */

$this->breadcrumbs=array(
	'案例'=>array('childcase/index'),
	'手术预算和资助情况'=>array('childcase/update','id'=>$_GET['id'],'flag'=>'chris'),
	'创建医生评价',
);

$this->menu=array(
	array('label'=>'List MedicalInfo', 'url'=>array('index')),
	array('label'=>'Manage MedicalInfo', 'url'=>array('admin')),
);
?>
<div class="page-header">
	<h2>创建 医学评估 医疗报告</h2>
</div>
<?php if(count($files) > 0){ foreach ($files as $key => $file) {?>
<div class="row-fluid">
	<div class="span4">
		<p>
			<?php 
			  	echo CHtml::image(IMG_CLOUD.'/case/'.$folder.'/'.$file->path,"file",array("width"=>300,"height"=>200)); 
			?>
		</p>
	</div>
	<div class="span8">
	<form id="medical-info-form" action="<?php echo $this->createUrl('medicalinfo/create',array('id'=>$id,'type'=>$type))?>" method="post">
		<div class="control-group">
			<label class="control-label required" for="MedicalInfo_title">标题 <span class="required">*</span></label>				
			<div class="controls">
				<input size="60" maxlength="80" class="span5" name="MedicalInfo[title]" type="text" value="<?php echo FileArray::getLabel($type);?>" />								
			</div>
		</div>
		<input type="hidden" name="MedicalInfo[file_id]" value="<?php echo $file->id;?>"/>
		<div class="control-group">
			<label class="control-label required" for="MedicalInfo_content">内容 <span class="required">*</span></label>				
			<div class="controls">
				<textarea rows="15" cols="50" class="span8 medicalinfo_content" name="MedicalInfo[content]"></textarea>								
			</div>
		</div>
		<div class="control-group">
			<div class=" buttons">
				<input class="btn btn-primary" type="submit" name="yt0" value="保存" />				
			</div>
		</div>
	</form>
	</div>
</div>
<hr>
<?php }}else{?>
<p class="alert">没有找到有该标签的文件，您还没有上传相关文件，立即去上传？</p>
<a href="<?php echo $this->createUrl('childcase/update',array('id'=>$model->case_id,'flag'=>'mbg'))?>" class="btn">去上传</a>
<?php }?>

<?php
  Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js/vendor/redactor/redactor.css');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/vendor/redactor/redactor.min.js',CClientScript::POS_END);
  Yii::app()->clientScript->registerScript('form-content', '
    $(function(){
      $(".medicalinfo_content").redactor({
      	minHeight: 200
      });
  })', CClientScript::POS_END);
?>
