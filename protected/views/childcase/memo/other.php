<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'case-family-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'enableClientValidation' => true,
  'clientOptions' => array(
      'validateOnSubmit' => true,
  ),
	'action'=>Yii::app()->createUrl('caseFamily/create')
)); ?>
<legend>其他家庭成员信息</legend>
<?php if(count($model->family) >0):?>
<table class="table table-bordered table-striped">
	<thead>
	<tr>
		<th>姓名</th>
		<th>关系</th>
		<th>年龄</th>
		<th>职业</th>
		<th>年收入</th>
		<th>健康状况</th>
		<th>备注</th>
		<th>操作</th>
	</tr>
	</thead>
	<tbody>
		<?php foreach($model->family as $f):?>
		<?php if($f->is_immediate == 0):?>
		<tr>
			<td><?php echo $f->name;?></td>
			<td><?php echo $f->r_label[$f->relationship]?></td>
			<td><?php echo $f->age;?></td>
			<td><?php echo $f->career;?></td>
			<td><?php echo $f->annual_income;?></td>
			<td><?php echo $f->health_state;?></td>
			<td><?php echo $f->note;?></td>
			<td>
				<a href="<?php echo $this->createUrl('caseFamily/update',array('id'=>$f->id));?>" class="btn btn-primary">Edit</a>
        <a href="<?php echo $this->createUrl('caseFamily/delete',array('id'=>$f->id));?>" class="btn btn-danger">Delete</a>
			</td>
		</tr>
	<?php endif;?>
	<?php endforeach;?>
	</tbody>
</table>
<?php endif;?>
	<legend>添加其他家属（非直系亲属）</legend>

	<p class="help-block">带<span class="required">*</span> 是必填项目.</p>

	<?php echo $form->errorSummary($fmodel); ?>
	<input type="hidden" name="CaseFamily[case_id]" value=<?php echo $model->id;?>/>
	<input type="hidden" name="CaseFamily[return]" value="other"/>
	<?php echo $form->textFieldRow($fmodel,'name',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->dropDownListRow($fmodel, 'relationship', array('父亲','母亲','兄弟姐妹')); ?>
	
	<input type="hidden" name="CaseFamily[is_immediate]" value="0"/>

	<?php echo $form->textFieldRow($fmodel,'age',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($fmodel,'career',array('class'=>'span5','maxlength'=>80)); ?>

	<?php echo $form->textFieldRow($fmodel,'annual_income',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($fmodel,'health_state',array('class'=>'span5','maxlength'=>80)); ?>

	<?php echo $form->textAreaRow($fmodel,'note',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$fmodel->isNewRecord ? '添加' : '保存',
		)); ?>
	</div>

<?php $this->endWidget(); ?>



