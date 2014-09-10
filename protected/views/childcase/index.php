<?php
/* @var $this ChildController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'案例',
);
?>
<div class="page-header row-fluid">
  <div class="span6"><h1><a href="<?php echo $this->createUrl('index');?>">案例</a></h1></div>
  <div class="span6 text-right" style="padding-top:20px;">
    <a href="<?php echo $this->createUrl('create')?>" class="btn btn-primary"><i class="icon-plus icon-white"></i> 新建案例</a>
  </div>
</div>
<div class="row-fluid">
  <div class="span6">
    <div class="btn-group status_filter" data-toggle="buttons-checkbox">
      <a class="btn btn-mini btn-default" data-status="0">新建：<?php echo $new_count;?> </a>
      <a class="btn btn-mini btn-info" data-status="1">等待资助：<?php echo $pending_count;?> </a>
      <a class="btn btn-mini btn-primary" data-status="2">确认资助：<?php echo $confirm_count;?> </a>
      <a class="btn btn-mini" data-status="3">已资助：<?php echo $funded_count;?> </a>
      <a class="btn btn-mini" data-status="4">不资助：<?php echo $passed_count;?> </a>
    </div>
  </div>
  <div class="span6 text-right">
  <form id="filter-form" class="form-inline" action="<?php echo $this->createUrl('index');?>" method="post">
    <input id="filter_search" class="span6" placeholder="姓名或昵称" type="text" value="" name="name">
    <input class="btn" style="margin-left:5px;" id="filter_btn" type="submit" value="搜索">
  </form>
  </div>
</div>
<?php $pre_html = '
<table class="table table-striped table-bordered">
    <thead>
    <tr>
      <th width="15">#</th>
      <th><i class="icon-user"></i> 姓名</th>
      <th><i class="icon-bookmark"></i> 来源</th>
      <th><i class="icon-tasks"></i> 状态</th>
      <th><i class="icon-user"></i> 创建者</th>
      <th width="500"><i class="icon-edit"></i> 操作</th>
    </tr>
    </thead>
'?>
<?php $post_html = '
</table>
'?>
<?php $this->widget('bootstrap.widgets.TbListView', array(
  'dataProvider'=>$dataProvider,
  'itemView'=>'_view',
  'id'=>'items_list',
  'preItemsTag'=>$pre_html,
  'postItemsTag'=>$post_html,
)); ?>

<?php 
  Yii::app()->clientScript->registerScript('items_update', "$('.status_filter a').on('click',function(e){
        e.preventDefault();
        $('.status_filter a').removeClass('active');
        $.fn.yiiListView.update('items_list', {
                data: {status : $(this).data('status')},
            }
        );
    });
    return false;",
    CClientScript::POS_READY);
?>