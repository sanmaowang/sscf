<?php
/* @var $this ChildController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'患儿案例',
);
?>
<div class="page-header row-fluid">
  <div class="span6"><h1>患儿案例</h1></div>
  <div class="span6 text-right" style="padding-top:20px;"><a href="<?php echo $this->createUrl('create')?>" class="btn btn-primary"><i class="icon-plus icon-white"></i> 新建案例</a></div>
</div>
<?php $pre_html = '
<table class="table table-striped table-bordered">
    <thead>
    <tr>
      <th width="15">#</th>
      <th><i class="icon-user"></i> 孩子名称</th>
      <th><i class="icon-user"></i> 来源</th>
      <th width="100"  style="text-align:center;"><i class="icon-tasks"></i> 状态</th>
      <th>创建者</th>
      <th width="200"><i class="icon-edit"></i> 操作</th>
    </tr>
    </thead>
'?>
<?php $post_html = '
</table>
'?>
<?php $this->widget('bootstrap.widgets.TbListView', array(
  'dataProvider'=>$dataProvider,
  'itemView'=>'_view',
  'preItemsTag'=>$pre_html,
  'postItemsTag'=>$post_html,
  'sortableAttributes'=>array(
        'id',
        'create_datetime',
    ),
)); ?>
