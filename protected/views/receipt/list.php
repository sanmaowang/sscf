<?php
$this->breadcrumbs=array(
	'票据',
);

$this->menu=array(
  array('label'=>'Operation'),
  array('label'=>'Donors','icon'=>'user', 'url'=>array('donor/index')),
  array('label'=>'Receipts','icon'=>'file', 'url'=>array('receipt/list'),'active'=>true),
);

?>
<?php $this->widget('application.extensions.swfupload.CSwfUpload', array(
  'jsHandlerUrl'=>'/js/vendor/swfupload/handlers.js', //Relative path
  'postParams'=>array(),
  'config'=>array(
    'use_query_string'=>true,
    'upload_url'=>$this->createUrl('receipt/createReceipt'), //Use $this->createUrl method or define yourself
    'file_size_limit'=>'4 MB',
    'file_types'=>'*.pdf;*.jpg;*.png;*.gif',
    'file_types_description'=>'All Files',
    'file_upload_limit'=>0,
    'file_queue_limit'=>0,
    'file_queue_error_handler'=>'js:fileQueueError',
    'file_dialog_complete_handler'=>'js:fileDialogComplete',
    'upload_progress_handler'=>'js:uploadProgress',
    'upload_error_handler'=>'js:uploadError',
    'upload_success_handler'=>'js:uploadSuccess',
    'upload_complete_handler'=>'js:uploadComplete',
    'custom_settings'=>array('upload_target'=>'divFileProgressContainer'),
    'button_placeholder_id'=>'swfupload',
    'button_width'=>100,
    'button_height'=>30,
    'button_window_mode'=>'js:SWFUpload.WINDOW_MODE.TRANSPARENT',
    'button_cursor'=>'js:SWFUpload.CURSOR.HAND',
    ),
  )
);
?>
<div class="page-header row-fluid">
  <div class="span4">
      <h1>票据</h1>
  </div>
  <div class="span8 text-right" style="padding-top:20px;">
    <a href="#" class="btn btn-primary" style="position:relative;"><i class="icon-file icon-white"></i> 批量上传 <span id="swfupload"></span></a> 
  </div>
</div>
<div id="divFileProgressContainer"></div>
<table class="table table-striped">
  <thead>
	<tr>
		<th>#</th>
		<th>Name</th>
    <th>Owner</th>
		<th>Create time</th>
		<th>Operation</th>
	</tr>
  </thead>
	<?php foreach ($model as $key => $file) {?>
	<tr>
		<td><?php echo $key+1;?></td>
		<td><a href="<?php echo $this->createUrl('receipt/view',array('id'=>$file->id));?>"><?php echo $file->name;?></a></td>
		<td><?php if(isset($file->donor)){ 
      foreach($file->donor as $key=>$user){  if($key != 0){ echo ', ';} echo $user->username;}
    }?></td>
		<td><?php echo $file->create_time;?></td>
		<td>
      <a class="btn btn-info btn-mini"  href="<?php echo $this->createUrl('receipt/update',array('id'=>$file->id))?>">Edit</a>
      <a class="btn btn-success btn-mini"  href="<?php echo $this->createUrl('receipt/hand',array('id'=>$file->id))?>">Add Owner</a>
      <a class="btn btn-primary btn-mini" target="_blank" href="<?php echo Yii::app()->baseUrl.'/receipt/download/'.$file->id;?>">Download</a>
      <a class="btn btn-danger btn-mini"  href="<?php echo $this->createUrl('receipt/view',array('id'=>$file->id))?>">Delete</a>
		</td>
	</tr>
	<?php }?>
</table>
<div class="pagination">
<?php 
$this->widget('bootstrap.widgets.TbPager', array(
  'currentPage'=>$pages->getCurrentPage(),
  'itemCount'=>$item_count,
  'pageSize'=>$page_size,
  'maxButtonCount'=>5,
  //'nextPageLabel'=>'My text >',
  'header'=>'',
  'htmlOptions'=>array('class'=>'pages'),
  ));
?>
</div>
<?php
  $baseUrl = Yii::app()->baseUrl;
  $js = Yii::app()->getClientScript();
  $js->registerCssFile($baseUrl. "/js/vendor/swfupload/default.css");
?>
