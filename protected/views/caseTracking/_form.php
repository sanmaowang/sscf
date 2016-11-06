<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'case-tracking-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($model); ?>

<table class="table table-striped">
	<thead>
	<tr>
		<th>#</th>
		<th width="120">Tracking</th>
		<th width="120">Date</th>
		<th>Latest Update</th>
		<th>Operation</th>
	</tr>
	</thead>
	<?php for($i=1; $i<12; $i++){?>
	<tr>
		<th width="12"><?php echo $i;?></th>
		<th valign = "middle"><?php echo $form->labelEx($model,'step'.$i);?></th>
		<td>2016-10-<?php echo $i?>;
		</td>
		<td>
			<?php echo $model->getLatestLog();?>
		</td>
		<td>
			<a href="#myModal" role="button" class="btn btn-mini" data-toggle="modal">编辑</a>
			<a href="#view" class="btn btn-mini">查看记录</a>
		</td>
	</tr>
	<?php }?>
</table>
<?php $this->endWidget(); ?>

<!-- Button to trigger modal -->
<a href="#myModal" role="button" class="btn" data-toggle="modal">查看演示案例</a>
 
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"></h3>
  </div>
  <div class="modal-body">
    <p>
    	<form action="">
    		<div class="control-group">
    			<label for="" class="control-label">更新内容</label>
    			<div class="controls"></div>
    		</div>
    		<div class="control-group">
    			<label for="" class="control-label">更新时间</label>
    			<div class="controls"></div>
    		</div>
    		<div class="form-actions">
					
				</div>
    	</form>
    </p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
</div>
