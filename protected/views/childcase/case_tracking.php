<?php
$this->breadcrumbs=array(
	'案例'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Case Tracking',
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
Yii::app()->clientScript->registerScript('date', "
$('.changedate').click(function(e){
	e.preventDefault();
	var _id = $(this).data('id');
	var _f = $(this).data('lock');
	var _date_input = $('#finish_date');
	var _name = $(this).parent().siblings().eq(1).find('label').html();
	var _val = $(this).parent().siblings().eq(2).html();

	_date_input.attr('name','CaseTracking[step'+_id+']');
	_date_input.val(_val);
	$('#form_name').html(_name);
	$('#tracking_date').show();
	return false;
});

$('#cllopase').on('click',function(e){
	e.preventDefault();
	$('#tracking_date').hide();
});

");
?>
<div class="page-header">
<h1>Case Tracking</h1>
</div>
<div id="tracking_date" style="display:none;">
	<h4>修改日期</h4>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'case-tracking-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); ?>
<div class="control-group" style="background:#f5f5f5;padding:15px 10px;border:1px solid #ddd;">
	<label for="" class="control-label"><span id="form_name"></span> 日期</label>
	<div class="controls">
		<input id="finish_date" type="text" class="form-control datetime" value="" placeholder="" name="">	
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
		)); ?>	
		<a href="#" class="btn" id="cllopase">关闭</a>
	</div>
</div>
<?php $this->endWidget(); ?>
</div>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'case-track',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($caseTracking); ?>

<table class="table table-striped">
	<thead>
	<tr>
		<th>#</th>
		<th width="120">Tracking</th>
		<th width="120">Date</th>
		<th>Latest Update</th>
		<th>Operation</th>
	</tr>
	</thead>
	<?php for($i=1; $i<12; $i++){?>
	<tr>
		<th width="12"><?php echo $i;?></th>
		<th valign = "middle"><?php echo $form->labelEx($caseTracking,'step'.$i);?></th>
		<td><?php echo $caseTracking['step'.$i]?>
		</td>
		<td>
			<?php if($caseTracking->getLatestLog($i)) echo "【".substr($caseTracking->getLatestLog($i)->log_time,0,10)."】".$caseTracking->getLatestLog($i)->log_content;?>
		</td>
		<td>
			<a href="#view" class="btn btn-mini changedate" data-lock="false" data-id="<?php echo $i;?>">日期</a>
			<a href="<?php echo $this->createUrl('casetrackinglog',array('mid'=>$model->id,'tid'=>$caseTracking->id,'sid'=>$i))?>" class="btn btn-mini">记录</a>
		</td>
	</tr>
	<?php }?>
</table>
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