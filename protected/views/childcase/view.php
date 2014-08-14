<?php
/* @var $this ChildcaseController */
/* @var $model Childcase */

$this->breadcrumbs=array(
	'Case'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Childcase', 'url'=>array('index')),
	array('label'=>'Create Childcase', 'url'=>array('create')),
	array('label'=>'Update Childcase', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Childcase', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Childcase', 'url'=>array('admin')),
);
$topics = array("fbg","pic","mbg","casesummary","appfiles");
?>
<div class="page-header row-fluid" style="border:none;margin-bottom:10px;">
	<div class="span6">
<h2><?php echo $model->name; ?> </h2>
<p class="muted"><span>海星尽职调查专员: <?php echo CHtml::encode($model->charge->name); ?></span> <span style="margin-left:30px;">其他基金会牵头人: <?php if($model->other_foundation_staff){ echo CHtml::encode($model->other_foundation_staff);} else{ echo "暂无登记";}; ?></span></p>
</div>
  <div class="span6 text-right" style="padding-top:20px;">
  	<a href="<?php echo $this->createUrl('update',array('id'=>$model->id,'flag'=>'child'))?>" class="btn btn-info"><i class="icon-edit icon-white"></i> 编辑案例</a>
  	<!--<a href="<?php echo $this->createUrl('submit',array('id'=>$model->id))?>" class="btn btn-inverse"><i class="icon-inbox icon-white"></i> Dropbox Sync</a>-->
  </div>
</div>
<ul class="nav nav-tabs" id="child_info">
  <li class="active"><a href="#basic_info">DC MEMO</a></li>
  <li><a href="#medical_assessment">Medical Assessment</a></li>
  <li><a href="#fbg">Family Background</a></li>
  <li><a href="#pic">Pictures</a></li>
  <li><a href="#mbg">Medical Background</a></li>
  <li><a href="#casesummary">Case Summary and Post-Surgery</a></li>
  <li><a href="#appfiles">Application Files</a></li>
</ul>
<div class="tab-content">
  <div class="tab-pane active" id="basic_info">
		  <div class="row-fluid">
		  	<div class="span2">
		  		<?php $model->avatar = empty($model->avatar)?"noavatar.jpg":$model->avatar?>
			    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/uploads/avatar/'.$model->avatar,"avatar",array("width"=>120)); ?>
		  	</div>
		  	<div class="span10">
		  		<table class="table table-bordered">
		<tr>
	<th>
		患儿姓名
	</th>
	<td>
		<?php echo CHtml::encode($model->name); ?>
	</td>
	<th>
		出生日期
	</th>
	<td>
		<?php echo CHtml::encode($model->birthday); ?>
	</td>
	<th>
		性别
	</th>
	<td>
		<?php if($model->gender == 0){echo "男";}elseif($model->gender == 1){ echo "女";};?>
	</td>
	<th>
		出生地
	</th>
	<td colspan="2">
		<?php echo CHtml::encode($model->home); ?>
	</td>
</tr>
<tr>
	<th>
		身高（厘米）
	</th>
	<td>
		<?php echo CHtml::encode($model->height); ?>
	</td>
	<th>
		体重（公斤）
	</th>
	<td>
		<?php echo CHtml::encode($model->weight); ?>
	</td>
	<th colspan="2">
		身份证号
	</th>
	<td colspan="3">
		<?php echo CHtml::encode($model->id_card); ?>
	</td>
</tr>
<tr>
	<th>
		家庭详细地址
	</th>
	<td colspan="3">
		<?php echo CHtml::encode($model->home); ?>
	</td>
	<th>
		民族
	</th>
	<td>
		<?php echo CHtml::encode($model->nation); ?>
	</td>
	<th colspan="2">
		户口性质
	</th>
	<td>
		<?php echo CHtml::encode($model->citivaltype); ?>
	</td>
</tr>
<tr>
	<th>
		家庭联系人
	</th>
	<td colspan="2">
		<?php echo CHtml::encode($model->contact); ?>
	</td>
	<th>
		联系电话
	</th>
	<td colspan="5">
		<?php echo CHtml::encode($model->telephone); ?>
	</td>
</tr>
</table>
</div>
<div class="row-fluid">
<h4>家庭直系亲属基本信息</h4>
<?php if(count($model->family) >0):?>
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
	</tr>
	</thead>
	<tbody>
		<?php foreach($model->family as $f):?>
		<?php if($f->is_immediate == 1):?>
		<tr>
			<td><?php echo $f->name;?></td>
			<td><?php echo $f->relationship?></td>
			<td><?php echo $f->age;?></td>
			<td><?php echo $f->id_card;?></td>
			<td><?php echo $f->education;?></td>
			<td><?php echo $f->nation;?></td>
			<td><?php echo $f->career;?></td>
			<td><?php echo $f->annual_income;?></td>
		</tr>
	<?php endif;?>
	<?php endforeach;?>
	</tbody>
</table>
<?php endif;?>
<h4>其他家庭成员信息</h4>
<?php if(count($model->family) >0):?>
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
	</tr>
	</thead>
	<tbody>
		<?php foreach($model->family as $f):?>
		<?php if($f->is_immediate == 0):?>
		<tr>
			<td><?php echo $f->name;?></td>
			<td><?php echo $f->relationship?></td>
			<td><?php echo $f->age;?></td>
			<td><?php echo $f->id_card;?></td>
			<td><?php echo $f->education;?></td>
			<td><?php echo $f->nation;?></td>
			<td><?php echo $f->career;?></td>
			<td><?php echo $f->annual_income;?></td>
		</tr>
	<?php endif;?>
	<?php endforeach;?>
	</tbody>
</table>
<?php endif;?>
<h4>病情描述</h4>
<table class="table table-bordered table-striped">
<tbody>
<tr>
<td width="300" >患儿病情描述</td>
<td colspan="6"><?php echo CHtml::encode($model->state_desc); ?></td>
</tr>
<tr>
<td>是否有医疗保险及跨地区治疗报销比例</td>
<td colspan="6"><?php echo CHtml::encode($model->medical_insurance_rate); ?></td>
</tr>
<tr>
<td>当地民政或其他形式的大病救助补贴</td>
<td colspan="6"><?php echo CHtml::encode($model->other_subsidy); ?></td>
</tr>
<tr>
<td>是否有家族遗传病、其他重大疾病（如有请详细说明）</td>
<td colspan="6"><?php echo CHtml::encode($model->have_other_illness); ?></td>
</tr>
<tr>
<td>是否在半年内患有肺炎（如有请详细说明肺炎治疗时间和治疗经过）</td>
<td colspan="6"><?php echo CHtml::encode($model->have_pneumonia); ?></td>
</tr>
<tr>
<td>手术医院</td>
<td><?php echo CHtml::encode($model->operation_hospital); ?></td>
<td>主治大夫</td>
<td colspan="2"><?php echo CHtml::encode($model->doctor); ?></td>
<td>是否一次性根治</td>
<td><?php echo CHtml::encode($model->is_one_time_cure); ?></td>
</tr>
<tr>
<td>入院时间</td>
<td><?php echo CHtml::encode($model->admission_time); ?></td>
<td colspan="2">计划手术时间</td>
<td colspan="3"><?php echo CHtml::encode($model->operation_plan_time); ?></td>
</tr>
</tbody>
</table>
			<div class="row-fluid">
				<div class="span6 offset6 text-right">
					
				</div>
			</div>
	</div>
</div>
</div>
<div class="tab-pane" id="medical_assessment">
</div>
  <?php foreach($topics as $t){?>
  <div class="tab-pane" id="<?php echo $t;?>">
  	<?php if(count($model->files) >0):?>
  	<ul class="thumbnails">
		<?php foreach($model->files as $f):?>
		<?php if($f->getCate() == $t):?>
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
			  echo CHtml::image(Yii::app()->request->baseUrl.'/uploads/case/'.$folder_type[$model->status].'/'.$f->path,"file",array("width"=>300,"height"=>195)); 
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
          <span class="label label-info"><?php echo $f->getLabel($f->key);?></span>
          <p><?php echo $f->desc;?></p>
        </div>
      </div>
    </li>
		<?php endif;?>
    <?php endforeach;?>
		</ul>
		<?php endif;?>
  </div>
	<?php }?>
</div>


<script>
  $(function () {
    $('#child_info a').click(function (e) {
		  e.preventDefault();
		  $(this).tab('show');
		})
  })
</script>

