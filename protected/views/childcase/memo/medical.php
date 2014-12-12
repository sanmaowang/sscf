<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'childcase-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); ?>
<legend>病情描述</legend>
	<p class="help-block">带<span class="required">*</span> 是必填项目.</p>

	<?php echo $form->errorSummary($model); ?>
	<p></p>
	<div class="control-group ">
		<label class="control-label required" for="Childcase_medical_insurance_rate">是否有医疗保险及跨地区治疗报销比例 <span class="required">*</span></label>
		<div class="controls">
			<select name="insurance_type" id="insurance_type">
				<option value="新型农村合作医疗">新型农村合作医疗</option>
				<option value="城镇居民基本医疗保险">城镇居民基本医疗保险</option>
				<option value="城镇职工基本医疗保险">城镇职工基本医疗保险</option>
				<option value="无">无</option>
			</select>
			<div class="input-append">
				<input class="span3" maxlength="255" name="insurance_rate" id="insurance_rate" type="text">
			  <span class="add-on">%</span>
			</div>
		</div>
	</div>
	<?php echo $form->hiddenField($model,'medical_insurance_rate',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'other_subsidy',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textAreaRow($model,'have_other_illness',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'have_pneumonia',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="control-group ">
		<label class="control-label required" for="Childcase_operation_hospital">手术医院 <span class="required">*</span></label>
		<div class="controls">
			<select name="Childcase[operation_hospital]" id="Childcase_operation_hospital">
			</select>
		</div>
	</div>
	<div class="control-group ">
		<label class="control-label required" for="Childcase_doctor">主刀大夫 <span class="required">*</span></label>
		<div class="controls">
			<select name="Childcase[doctor]" id="Childcase_doctor">
			</select>
		</div>
	</div>


	<?php echo $form->textFieldRow($model,'is_one_time_cure',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'surgery_time',array('class'=>'span5')); ?>
	<?php echo $form->textFieldRow($model,'admission_time',array('class'=>'span5 datetime')); ?>

	<?php echo $form->textFieldRow($model,'operation_plan_time',array('class'=>'span5 datetime')); ?>

	<?php echo $form->textAreaRow($model,'state_desc',array('rows'=>6, 'cols'=>50, 'class'=>'span8','hint'=>'（发现患病的时间、治疗经过和现阶段诊断结果）')); ?>

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
    		format:'yyyy/mm/dd'
    	});
		", CClientScript::POS_END);
?>


<?php
  Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js/vendor/redactor/redactor.css');
  Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/vendor/redactor/redactor.min.js',CClientScript::POS_END);
  Yii::app()->clientScript->registerScript('form-content', '
    $(function(){
      $("#Childcase_state_desc").redactor({
      	minHeight: 200
      });
  		$("#insurance_rate").on("input propertychange",function(){
  			var _v = $(this).val();
  			var _type = $("#insurance_type").val();
  			console.log(_type);
  			$("#Childcase_medical_insurance_rate").val(_type+_v);
  		});
  		$("#insurance_type").on("change",function(){
  			if($(this).val() == "无"){
  				$("#insurance_rate").hide();
  				$("#Childcase_medical_insurance_rate").val("无");
  			}else{
  				$("#insurance_rate").show();
  			}
  		})
  })', CClientScript::POS_END);
?>

<script>
	$(function(){
		var source_data;
		$.get("<?php echo $this->createUrl('org/getcontacts',array('type'=>'hospital'));?>",function(data){
			source_data = data;
			var segment = '';
			for(var key in source_data){
				var selected = '';
				if(key == "<?php echo $model->operation_hospital;?>"){
					selected = "selected = 'selected'";
				}
				segment += '<option value = "'+ key+'" '+selected+' >'+ data[key].name+ '</option>';
			}
			$("#Childcase_operation_hospital").html(segment);

			$("#Childcase_operation_hospital").on("change",function(){
				var oid = $(this).val();
				if(source_data[oid].contacts){
					var _contacts = source_data[oid].contacts;
					var _segment = "";
					for(var key in _contacts){
						var contact = _contacts[key];
						var selected = '';
						if(contact.id == "<?php echo $model->doctor;?>"){
							selected = "selected = 'selected'";
						}
						_segment += '<option value = "'+ contact.id+'" '+selected+' >'+ contact.name+ '</option>';
					}
					$("#Childcase_doctor").html(_segment);
				}else{
					$("#Childcase_doctor").html('');
					alert("该机构下无医生记录，请先在机构中添加");
				}
			});

			$("#Childcase_operation_hospital").trigger("change");

		});
		
	})

</script>
