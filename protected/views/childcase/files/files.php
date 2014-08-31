<?php 
	$page_title = array(
		"appfiles"=>'Application files',
		"mbg"=>"Medical Background",
		"fbg"=>"Family Background",
		"pic"=>"Medical Background",
		"casesummary"=>"Case Summary and Post-Surgery",
	);
	$radio_label = array(
		"fbg"=>array(
			"family_idcard"=>"父母及监护人身份证",
			"family_registry"=>"患儿及家庭成员户口本",
			"family_proof"=>"贫困证明（乡级以上盖章有效）",
			"family_other"=>"其它",
			// "father_id"=>"身份证（父亲）",
			// "mother_id"=>"身份证（母亲）",
			// "other_id"=>"身份证（父母外监护人）",
			// "other_im_id"=>"身份证（其他直系亲属）",
			// "other_fm_id"=>"身份证（其他家庭成员）",
			// "parent_registry"=>"户口页（父亲）",
			// "mother_registry"=>"户口页（母亲）",
			// "other_registry"=>"户口页（父母外监护人）",
			// "other_im_registry"=>"户口页（其他直系亲属）",
			// "other_fm_registry"=>"户口页（其他家庭成员）",
			// "other_cun_proof"=>"贫困证明（村级盖章）",
			// "other_xiang_proof"=>"贫困证明（乡级以上盖章）",
			// "other_file"=>"其他文件",
		),
		"pic"=>array(
			"pic_life"=>"患儿生活照片",
			"pic_household"=>"家庭房屋照片",
			"pic_visit"=>"海星探视孩子照片",
			"pic_other"=>'其它照片'
		),
			"mbg"=>array(
				"mbg_echocardiography"=>"心脏彩超（超声心动）报告",
				"mbg_IV"=>"导管诊断报告（如做导管）",
				"mbg_X_Ray"=>"胸部X光片报告（有肺炎记录）",
				"mbg_CT_Directed"	=>"CT引导穿刺",
				"mbg_3D_Echocardiography"	=>"三维心超图、心电图",
				"mbg_Lung_infection"	=>"肺炎住院纪录、肺炎用药治疗纪录（有过肺炎并住院治疗的患儿）",
				"mbg_Incurred_medical_expenses"	=>"已经产生的医疗费用收费单据（已经有过手术或者肺炎治疗的孩子）",
				"mbg_other"=>"其他资料"
			),
			"casesummary"=>array(
				"case_Hospital_Receipt"=>"医院收据",
				"case_Expenses_Breakdown"=>"费用清单",
				"case_Discharge_Summary"=>"出院小结",
				"case_Funding_Source"=>"手术资金来源和费用明细(EXCEL)",
				"case_other"=>'其他文件'
			),
			"appfiles"=>array(
				"appfile_Indemnity_Agreement"=>"免责协议",
				"appfile_other"=>"其他文件",
				"attach_file"=>'附件',
				"dc_memo"=>'DC_demo'
			)
		);
?>
<legend><?php echo $page_title[$flag]?></legend>
<div class="row-fluid">
  <ul class="thumbnails">
  	<?php if(count($model->files) > 0):?>
		<?php foreach($model->files as $key=>$f):?>
		<?php if($f->getCate() == $flag):?>
    <li class="span3">
      <div class="thumbnail">
      	<div class="img-thumb">
      	<a class="files" href="<?php echo Yii::app()->request->baseUrl.'/uploads/case/'.$folder_type[$model->status].'/'.$f->path;?>">
      <?php 
      $img_exts = array("jpg","png","bmp","jpeg","gif");
      $excel_exts = array("xls","xlsx");
      $word_exts = array("doc","docx");
      $folder_type = array("under review","under review","under review","funded","passed");
      if(in_array($f->getExt(),$img_exts)){
			  echo CHtml::image(Yii::app()->request->baseUrl.'/uploads/case/'.$folder_type[$model->status].'/'.$f->path,"file",array("width"=>300,"height"=>200)); 
			}else if(in_array($f->getExt(),$excel_exts)){
			  echo CHtml::image(Yii::app()->request->baseUrl.'/img/excel.png',"file",array("class"=>'file-thumb')); 
			}else if(in_array($f->getExt(),$word_exts)){
			  echo CHtml::image(Yii::app()->request->baseUrl.'/img/word.png',"file",array("class"=>'file-thumb')); 
			}else{
			  echo CHtml::image(Yii::app()->request->baseUrl.'/img/file.png',"file",array("class"=>'file-thumb')); 
			}
			?>
			</a>
			</div>
        <div class="caption">
          <h4><?php echo $f->title?$f->title:"untitled";?></h4>
          <p><?php echo $f->desc;?></p>
          <p><a href="<?php echo $this->createUrl('caseFile/update',array('id'=>$f->id));?>" class="btn btn-primary">Edit</a>
          	<?php echo CHtml::ajaxLink('Delete',array('caseFile/delete','id'=>$f->id),
                  array('type'=>'POST','success'=>'function(data){var d = $.parseJSON(data);var _id = d.id;$("#delete-"+_id+"").parent().parent().parent().remove();}'),
                  array('confirm'=>'该操作不可逆，确定要删除吗?',
                        'id'=>'delete-'.$f->id,
                        'class'=>'btn btn-danger')); ?>
        </div>
      </div>
    </li>
		<?php endif;?>
    <?php endforeach;?>
		<?php endif;?>
  </ul>
</div>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'childcase-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
	'action'=>Yii::app()->createUrl('casefile/create')
)); ?>
<legend>添加新文件</legend>
	<p class="help-block">带<span class="required">*</span> 是必填项目.</p>
	<?php echo $form->errorSummary($amodel); ?>
	<input type="hidden" name="CaseFamily[return]" value="<?php echo $flag;?>"/>
	<?php echo $form->hiddenField($amodel,'case_id',array('class'=>'span5','value'=>$model->id)); ?>
	<?php echo $form->fileFieldRow($amodel,'path'); ?>
	<?php echo $form->dropDownListRow($amodel, 'key', $radio_label[$flag]); ?>
	<?php echo $form->textFieldRow($amodel,'title',array('class'=>'span5','maxlength'=>60,'id'=>'input_title')); ?>
	<?php echo $form->textAreaRow($amodel,'desc',array('rows'=>6, 'cols'=>50, 'class'=>'span8','placeholder'=>'选填')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$amodel->isNewRecord ? '创建' : '保存',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

<script>
	$(function(){
		$("input[type='radio']").on("change",function(){
			var val = $(this).siblings("label").html();
			if(val){
				$("#input_title").val(val);
			}
		});
	})
</script>
