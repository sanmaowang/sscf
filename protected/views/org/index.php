<?php
$this->breadcrumbs=array(
  '合作机构',
);

$this->menu=array(
  array('label'=>'Create','url'=>array('create')),
  array('label'=>'Manage','url'=>array('admin')),
);
?>
<div class="page-header row-fluid">
  <div class="span6"><h1>合作机构</h1></div>
  <div class="span6 text-right" style="padding-top:20px;"><a href="<?php echo $this->createUrl('create')?>" class="btn btn-primary"><i class="icon-plus icon-white"></i> 新建机构</a></div>
</div>
<?php $pre_html = '
<table class="table table-striped table-bordered">
    <thead>
    <tr>
      <th width="15">#</th>
      <th><i class="icon-user"></i> 名称</th>
      <th>类型</th>
      <th><i class="icon-tasks"></i> 联系方式</th>
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
  'preItemsTag'=>$pre_html,
  'postItemsTag'=>$post_html,
  'sortableAttributes'=>array(
        'id',
        'create_time',
    ),
)); ?>