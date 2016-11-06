<?php
$this->breadcrumbs=array(
	'案例'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Case Tracking'=>array('casetracking','id'=>$model->id),
	'Case Tracking Log',
);
$this->menu=array(
	array('label'=>'基本信息'),
	array('label'=>'患儿基本信息','url'=>array('update','id'=>$model->id,'flag'=>'child'),'active'=>$flag == 'child'),
	array('label'=>'家庭直系亲属基本信息','url'=>array('update','id'=>$model->id,'flag'=>'family'),'active'=>$flag == 'family'),
	array('label'=>'其他家庭成员信息','url'=>array('update','id'=>$model->id,'flag'=>'other'),'active'=>$flag == 'other'),
	array('label'=>'病情描述','url'=>array('update','id'=>$model->id,'flag'=>'medical'),'active'=>$flag == 'medical'),
	array('label'=>'手术预算和资助情况','url'=>array('update','id'=>$model->id,'flag'=>'economic'),'active'=>$flag == 'economic'),
	array('label'=>'医疗评估'),
	array('label'=>'医疗评估','url'=>array('update','id'=>$model->id,'flag'=>'chris'),'active'=>$flag == 'chris'),
	array('label'=>'附加材料'),
	array('label'=>'家庭背景','url'=>array('update','id'=>$model->id,'flag'=>'fbg'),'active'=>$flag == 'fbg'),
	array('label'=>'病史','url'=>array('update','id'=>$model->id,'flag'=>'mbg'),'active'=>$flag == 'mbg'),
	array('label'=>'照片','url'=>array('update','id'=>$model->id,'flag'=>'pic'),'active'=>$flag == 'pic'),
	array('label'=>'结案及术后','url'=>array('update','id'=>$model->id,'flag'=>'casesummary'),'active'=>$flag == 'casesummary'),
	array('label'=>'申请表','url'=>array('update','id'=>$model->id,'flag'=>'appfiles'),'active'=>$flag == 'appfiles'),
	array('label'=>'Case管理信息'),
	array('label'=>'案例负责人及状态变更','url'=>array('updatecase','id'=>$model->id,'flag'=>'case'),'active'=>$flag == 'case'),
	array('label'=>'Case Tracking','url'=>array('casetracking','id'=>$model->id,'flag'=>'tracking'),'active'=>$flag == 'tracking'),
);
?>
<div class="page-header">
<h1>Case Tracking - <?php echo $caseTracking->getStep($sid);?></h1>
</div>
<div id="log_list" style="margin-bottom:30px;">
<h4>每周更新</h4>
<ul>
<?php if(isset($trackinglogs)){
	foreach ($trackinglogs as $key => $log) {?>
	<li>【<?php echo substr($log->log_time,0,10);?>】 <?php echo $log->log_content;?></li>
<?php	}}?>
</ul>
</div>
<h4>添加记录</h4>
<hr>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'case-track',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($log); ?>
	<?php echo $form->textFieldRow($log,'log_time',array('class'=>'span5 datetime')); ?>

	<?php echo $form->textAreaRow($log,'log_content',array('rows'=>6, 'cols'=>50, 'class'=>'span5')); ?>
	
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
		)); ?>	
	</div>
<?php $this->endWidget(); ?>

<?php
    $baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCssFile($baseUrl."/js/vendor/datepicker/datepicker.css");
    $cs->registerScriptFile($baseUrl."/js/vendor/datepicker/bootstrap-datepicker.js");
    $cs->registerScript('datetime', "
    	$('.datetime').datepicker({
    		format:'yyyy-mm-dd'
    	});
		", CClientScript::POS_END);
?>