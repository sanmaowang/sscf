<?php
$this->breadcrumbs=array(
	'会议'=>array('index'),
	$model->getName(),
	'会议纪要',
);

$this->menu=array(
	array('label'=>'Conference'),
	array('label'=>'正在进行的会议','url'=>array('index')),
	array('label'=>'已结束的会议','url'=>array('index?archive=1')),
	array('label'=>'Manage'),
	array('label'=>'会议管理','url'=>array('admin')),
);
?>
<div class="page-header">
	<h1>会议纪要</h1>
</div>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'conference-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textAreaRow($model,'summary',array('rows'=>12, 'cols'=>50, 'class'=>'span8','placeholder'=>'会议纪要')); ?>
	<div class="control-group">
		<label for="" class="control-label">参会成员</label>
		<div id="attendant" class="controls">
			<?php if(count($attendant)>0){ foreach ($attendant as $key => $a) {?>
				<a class="label label-success label-choose" href="#" data-id="<?php echo $a->user->id?>"><i class="icon icon-ok icon-white"></i>	<?php echo $a->user->name;?></a>
				<input type="hidden" name="ConferenceAttendance[<?php echo $a->id;?>]" id="attendance_user_<?php echo $a->user->id;?>" value="1">
			<?php }}?>
		</div>
	</div>
	<div class="control-group">
		<label for="" class="control-label">缺勤成员</label>
		<div id="absence" class="controls">
			<?php if(count($absence)>0){ foreach ($absence as $key => $a) {?>
				<a class="label label label-cancel" href="#" data-id="<?php echo $a->user->id?>"><?php echo $a->user->name;?></a>
				<input type="hidden" name="ConferenceAttendance[<?php echo $a->id;?>]" id="attendance_user_<?php echo $a->user->id;?>" value="0">
			<?php }}?>
		</div>
	</div>

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
    $cs->registerCss('attach',"
			.controls .label{
				margin:5px;
				padding:6px;
			}
    ");
    $cs->registerCssFile($baseUrl."/js/vendor/datepicker/datepicker.css");
    $cs->registerScriptFile($baseUrl."/js/vendor/datepicker/bootstrap-datepicker.js");
		$cs->registerScript('datetime', "
    	$('.label').on('click',function(e){
    		e.preventDefault();
    		var _id = $(this).data('id');
    		var obj = $(this).clone();
    		if(obj.hasClass('label-success')){
    			obj.removeClass('label-success');
    			$('#attendance_user_'+_id).val(0);
    			$('#absence').append(obj);
    		}else{
    			obj.addClass('label-success');
    			$('#attendance_user_'+_id).val(1);
    			$('#attendant').append(obj);
    		}
    		$(this).remove();
    	});
		", CClientScript::POS_END);
?>
