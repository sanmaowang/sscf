<?php
$this->breadcrumbs=array(
	'List File',
);


$this->menu=array(
	array('label'=>'Operation'),
  array('label'=>'My File', 'icon'=>'file', 'url'=>array('index')),
  array('label'=>'List File', 'icon'=>'list', 'url'=>array('list'),'active'=>true,'visible'=>Yii::app()->user->isAdmin()),
  array('label'=>'Create File', 'icon'=>'plus', 'url'=>array('create'),'visible'=>Yii::app()->user->isAdmin()),
  array('label'=>'Manage File', 'icon'=>'pencil', 'url'=>array('admin'),'visible'=>Yii::app()->user->isAdmin()),
);
?>
<?php $this->widget('application.extensions.swfupload.CSwfUpload', array(
  'jsHandlerUrl'=>'/assets/swfupload/handlers.js', //Relative path
  'postParams'=>array(),
  'config'=>array(
    'use_query_string'=>true,
    'upload_url'=>$this->createUrl('file/createfile'), //Use $this->createUrl method or define yourself
    'file_size_limit'=>'4 MB',
    'file_types'=>'*.pdf,*.jpg;*.png;*.gif',
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
    'button_width'=>170,
    'button_height'=>20,
    'button_text'=>'<span class="button">'.Yii::t('messageFile', 'Upload Files').'</span>',
    'button_text_style'=>'.button { font-family: Arial, sans-serif; font-size: 13px; font-weight: bold; color: #002a7f }',
    'button_text_top_padding'=>0,
    'button_text_left_padding'=>0,
    'button_window_mode'=>'js:SWFUpload.WINDOW_MODE.TRANSPARENT',
    'button_cursor'=>'js:SWFUpload.CURSOR.HAND',
    ),
  )
);
?>
<h1>List File</h1>
<div class="row-fluid">
    <div class="swfupload">
      <i class="icon-plus"></i><span id="swfupload"></span>
    </div>
    <div id="divFileProgressContainer"></div>
 </div>
<table class="table table-striped" style="margin-top:30px;">
	<tr>
		<th>#</th>
		<th>Name</th>
		<th>Description</th>
		<th>Create time</th>
		<th>Owner</th>
		<th>Operation</th>
	</tr>
	<?php foreach ($model as $key => $file) {?>
	<tr>
		<td><?php echo $key+1;?></td>
		<td><a href="<?php echo $this->createUrl('file/view',array('id'=>$file->id));?>"><?php echo $file->name;?></a></td>
		<td><?php echo $file->description;?></td>
		<td><?php echo $file->create_time;?></td>
		<td><?php if(isset($file->user)){ 
			foreach($file->user as $key=>$user){  if($key != 0){ echo ', ';} echo $user->username;}
		}?></td>
		<td>
      <a class="btn btn-info btn-mini"  href="<?php echo $this->createUrl('view',array('id'=>$file->id))?>">View</a>
			<a class="btn btn-primary btn-mini" target="_blank" href="<?php echo Yii::app()->baseUrl.'/file/download/'.$file->id;?>">Download</a>
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
  $js->registerCssFile($baseUrl. "/assets/swfupload/default.css");
?>
