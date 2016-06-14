<?php 
$u = array();
foreach($users as $user){
	$u[$user->id] = $user->name;
}
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'childcase-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">带<span class="required">*</span> 是必填项目.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span3','maxlength'=>25)); ?>
	<div class="control-group ">
		<label class="control-label required" for="Childcase_source">案例来源 <span class="required">*</span></label>
		<div class="controls">
			<select name="Childcase[source]" id="Childcase_source">
			</select>
		</div>
	</div>
	<div class="control-group ">
		<label class="control-label required" for="Childcase_other_foundation_staff">牵头基金会联系人 <span class="required">*</span></label>
		<div class="controls">
			<select name="Childcase[other_foundation_staff]" id="Childcase_other_foundation_staff">
			</select>
		</div>
	</div>
	
	<?php echo $form->dropDownListRow($model,'staff',$u); ?>
	<?php echo $form->textFieldRow($model,'applicant',array('class'=>'span3','maxlength'=>11)); ?>
	<?php echo $form->textFieldRow($model,'applicant_relationship',array('class'=>'span3','maxlength'=>11)); ?>
	
	<?php echo $form->dropDownListRow($model,'status',$status = array(0 => "新建",1 => "审核中",2 => "同意资助",3 => "已打款",5 => "已结案",6 => "Deceased",4 => "不资助")); ?>

	<div id="kid-control" style="display:none;">
	<?php echo $form->textFieldRow($model,'kid',array('class'=>'span3','maxlength'=>25)); ?>
	</div>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? '创建' : '保存',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

<script>
	$(function(){
		var source_data;
		$.get("<?php echo $this->createUrl('org/getcontacts');?>",function(data){
			source_data = data;
			var segment = '';
			for(var key in source_data){
				var selected = '';
				if(key == "<?php echo $model->source?>"){
					selected = "selected = 'selected'";
				}
				segment += '<option value = "'+ key+'" '+selected+' >'+ data[key].name+ '</option>';
			}
			$("#Childcase_source").html(segment);

			$("#Childcase_source").on("change",function(){
				var oid = $(this).val();
				if(source_data[oid].contacts){
					var _contacts = source_data[oid].contacts;
					var _segment = "";
					for(var key in _contacts){
						var contact = _contacts[key];
						var selected = '';
						if(contact.id == "<?php echo $model->other_foundation_staff?>"){
							selected = "selected = 'selected'";
						}
						_segment += '<option value = "'+ contact.id+'" '+selected+' >'+ contact.name+ '</option>';
					}
					$("#Childcase_other_foundation_staff").html(_segment);
				}else{
					alert("该机构下无联系人记录，请先在机构中添加");
					$("#Childcase_other_foundation_staff").html('');
				}
			});

			$("#Childcase_source").trigger("change");

			$("#Childcase_status").on("change",function(){
				var _val = $(this).val();
				if(_val == 3){
					$("#kid-control").show();
				}else{
					$("#kid-control").hide();
				}
			})

			$("#Childcase_status").trigger("change");
			

		});
		
	})

</script>