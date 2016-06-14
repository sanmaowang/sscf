<?php 
	$img_exts = array("jpg","png","bmp","jpeg","gif");
  $excel_exts = array("xls","xlsx");
  $word_exts = array("doc","docx");
  $folder_type = array("under review","funded","passed","passed","passed");
  $fileUtil = new FileArray();
  $tags = $fileUtil->getDropDown($flag);
?>
<legend><?php echo $fileUtil->getPageTitle($flag);?></legend>
<div class="row-fluid">
  <ul class="thumbnails">
  	<?php if(count($model->files) > 0):?>
  	<?php for($i = 0,$j = 0; $i < count($model->files); $i++){
  		$f = $model->files[$i];
  	?>
		<?php if($f->getCate() == $flag):?>
		<li class="span4">
      <div class="thumbnail">
      	<div class="img-thumb">
      	<a class="files" href="<?php echo IMG_CLOUD.'/case/'.$folder_type[$model->folder].'/'.$f->path;?>">
      <?php 
      
      if(in_array($f->getExt(),$img_exts)){
        if(isset($model->folder)){
			   echo CHtml::image(IMG_CLOUD.'/case/'.$folder_type[$model->folder].'/'.$f->path,"file",array("width"=>300,"height"=>200)); 
        }
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
          <p>
          	<a href="#" class="label label-warning tags" data-id="<?php echo $f->id;?>"><?php echo $fileUtil->getLabel($f->key);?></a>
          	<a href="<?php echo $this->createUrl('casefile/update',array('id'=>$f->id,'flag'=>$flag));?>"><i class="icon icon-edit"></i></a>
          	<?php echo CHtml::ajaxLink('<i class="icon icon-trash"></i>',array('casefile/delete','id'=>$f->id),
                  array('type'=>'POST','success'=>'function(data){var d = $.parseJSON(data);var _id = d.id;$("#delete-"+_id+"").parent().parent().parent().remove();}'),
                  array('confirm'=>'该操作不可逆，确定要删除吗?',
                        'id'=>'delete-'.$f->id,
                        )); ?>
         </p>
        </div>
      </div>
    </li>
		<?php if(($j+1)%3 ==0){?>
			</ul><ul class="thumbnails">
  	<?php }$j++;?> 
		<?php endif;?>
  	<?php }?>
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
	'action'=>Yii::app()->createUrl('caseFile/create')
)); ?>
<legend>添加新文件</legend>
	<p class="help-block">带<span class="required">*</span> 是必填项目.</p>
	<?php echo $form->errorSummary($amodel); ?>
	<input type="hidden" name="CaseFamily[return]" value="<?php echo $flag;?>"/>
	<?php echo $form->hiddenField($amodel,'case_id',array('class'=>'span5','value'=>$model->id)); ?>
	<?php echo $form->fileFieldRow($amodel,'path'); ?>
	<?php echo $form->radioButtonListRow($amodel, 'key', $tags); ?>
	<?php echo $form->textFieldRow($amodel,'title',array('class'=>'span5','maxlength'=>60,'id'=>'input_title','hint'=>'请附上报告日期')); ?>
	<?php echo $form->textAreaRow($amodel,'desc',array('rows'=>6, 'cols'=>50, 'class'=>'span8','placeholder'=>'选填')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$amodel->isNewRecord ? '创建' : '保存',
		)); ?>
	</div>

<?php $this->endWidget(); ?>


<div id="tag" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="Tag" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">选择标签</h3>
  </div>
  <div class="modal-body">
    <p>
      <h4>家庭背景</h4>
    	<?php foreach ($fileUtil->getDropDown('fbg') as $key => $value) {
    	  echo "<a class='label taglabel' href='#' data-tag=".$key.">".$value."</a>&nbsp;&nbsp;";
    	}?>
      <h4>病史</h4>
      <?php foreach ($fileUtil->getDropDown('mbg') as $key => $value) {
        echo "<a class='label taglabel' href='#' data-tag=".$key.">".$value."</a>&nbsp;&nbsp;";
      }?>
      <h4>照片</h4>
      <?php foreach ($fileUtil->getDropDown('pic') as $key => $value) {
        echo "<a class='label taglabel' href='#' data-tag=".$key.">".$value."</a>&nbsp;&nbsp;";
      }?>
      <h4>结案及术后</h4>
      <?php foreach ($fileUtil->getDropDown('casesummary') as $key => $value) {
        echo "<a class='label taglabel' href='#' data-tag=".$key.">".$value."</a>&nbsp;&nbsp;";
      }?>
      <h4>申请表</h4>
      <?php foreach ($fileUtil->getDropDown('appfiles') as $key => $value) {
        echo "<a class='label taglabel' href='#' data-tag=".$key.">".$value."</a>&nbsp;&nbsp;";
      }?>
    </p>
  </div>
</div>

<?php
    $baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCssFile($baseUrl."/js/vendor/colorbox/colorbox.css");
    $cs->registerScriptFile($baseUrl.'/js/vendor/colorbox/jquery.colorbox-min.js',CClientScript::POS_END);
    $cs->registerScript('view-file', '
    $(function(){
      $(".files").colorbox({ innerWidth:500});
    })', CClientScript::POS_END);
?>

<script>
	$(function(){
		$("input[type='radio']").on("change",function(){
			var val = $(this).siblings("label").html();
			if(val){
				$("#input_title").val(val);
			}
		});
		var _updatedata = {};
		var _originTag;
		$(".tags").on("click",function(e){
			e.preventDefault();
			_updatedata.id = $(this).data('id');
			_originTag = $(this);
			$('#tag').modal('show');
		});
		$(".taglabel").on("click",function(e){
			e.preventDefault();
			_updatedata.key = $(this).data('tag');
			var _newTag = $(this).html();
			$.ajax({
            type: "post",
            dataType: 'json',
            url: "<?php echo $this->createUrl('casefile/updateTag');?>",
            data:_updatedata,
            cache: false,
            error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
            },
            success:function(data){
            	_originTag.html(_newTag);
            	_originTag.parent().siblings("h4").html(_newTag);
            	_originTag = null;
            	_updatedata = {};
							$("#tag").modal('hide');
             },
         });
		})
	})
</script>
