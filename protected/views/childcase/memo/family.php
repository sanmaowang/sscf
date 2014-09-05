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
<legend>家庭直系亲属基本信息</legend>

<table class="table table-bordered table-striped">
	<thead>
	<tr>
		<th>姓名</th>
		<th>关系</th>
		<th>年龄</th>
		<th>身份证号码</th>
		<th>文化程度</th>
		<th>民族</th>
		<th>职业</th>
		<th>年收入</th>
		<th>操作</th>
	</tr>
	</thead>
	<tbody>
		<?php if(count($model->family) >0):?>
		<?php foreach($model->family as $f):?>
		<tr>
			<td><?php echo $f->name;?></td>
			<td><?php echo $f->r_label[$f->relationship]?></td>
			<td><?php echo $f->age;?></td>
			<td><?php echo $f->id_card;?></td>
			<td><?php echo $f->r_edu[$f->education];?></td>
			<td><?php echo $f->nation;?></td>
			<td><?php echo $f->career;?></td>
			<td><?php echo $f->annual_income;?></td>
			<td>
				<a href="<?php echo $this->createUrl('caseFamily/update',array('id'=>$f->id));?>" class="btn btn-primary">Edit</a>
        <a href="<?php echo $this->createUrl('caseFamily/delete',array('id'=>$f->id));?>" class="btn btn-danger">Delete</a>
			</td>
		</tr>
		<?php endforeach;?>
		<?php endif;?>
	</tbody>
</table>

	<legend>添加家属直系亲属</legend>
	<p class="help-block">带<span class="required">*</span> 是必填项目.</p>

	<?php echo $form->errorSummary($fmodel); ?>
	<input type="hidden" name="CaseFamily[case_id]" value="<?php echo $model->id;?>"/>
	<input type="hidden" name="CaseFamily[return]" value="family"/>
	<?php echo $form->textFieldRow($fmodel,'name',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->dropDownListRow($fmodel, 'relationship', array('父亲','母亲','兄弟姐妹')); ?>

	<input type="hidden" name="CaseFamily[is_immediate]" value="1"/>
	
	<?php echo $form->textFieldRow($fmodel,'age',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($fmodel,'id_card',array('class'=>'span5','maxlength'=>80)); ?>
	<?php echo $form->dropDownListRow($fmodel, 'education', array('小学','初中','高中','本科','硕士','博士及其以上')); ?>

	<?php echo $form->textFieldRow($fmodel,'nation',array('class'=>'span5','maxlength'=>25)); ?>
	
	<?php echo $form->textFieldRow($fmodel,'career',array('class'=>'span5','maxlength'=>80)); ?>

	<?php echo $form->textFieldRow($fmodel,'annual_income',array('class'=>'span5','maxlength'=>25)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$fmodel->isNewRecord ? '添加亲属' : '保存',
		)); ?>
	</div>

<?php $this->endWidget(); ?>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'childcase-form',
	'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); ?>
	<legend>其它说明</legend>
	<?php echo $form->textAreaRow($model,'economical_source_desc',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'special_desc',array('rows'=>6, 'cols'=>50, 'class'=>'span8','placeholder'=>'1.家庭直系亲属包括父母和兄弟姐妹，请如实填写所有直系亲属情况，如身体有特殊情况，请在特殊情况说明中说明
2.如果患儿和其兄弟姐妹为学龄儿童，需要明确在哪个学校上几年级，上学的费用，请在特殊情况说明中注明。')); ?>

<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$fmodel->isNewRecord ? '保存' : '保存',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
