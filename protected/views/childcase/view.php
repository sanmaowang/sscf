<?php
/* @var $this ChildcaseController */
/* @var $model Childcase */

$this->breadcrumbs=array(
	'案例'=>array('index'),
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
$img_exts = array("jpg","png","bmp","jpeg","gif");
$excel_exts = array("xls","xlsx");
$word_exts = array("doc","docx");
$folder_type = array("under review","under review","under review","funded","passed");
?>
<div class="page-header row-fluid" style="border:none;margin-bottom:10px;">
	<div class="span6">
<h2><?php echo $model->name; ?> </h2>
<p class="muted"><span>海星尽职调查专员: <?php if($model->charge) echo CHtml::encode($model->charge->name); ?></span> <span style="margin-left:30px;">其他基金会牵头人: <?php if($model->otherfoundationstaff){ echo '<a href="'.$this->createUrl('orgContact/view',array('id'=>$model->otherfoundationstaff->id)).'">'.$model->otherfoundationstaff->name.'</a>';} else{ echo "暂无登记";}; ?></span></p>
</div>
  <div class="span6 text-right" style="padding-top:20px;">
  	<a href="<?php echo $this->createUrl('update',array('id'=>$model->id,'flag'=>'child'))?>" class="btn btn-info"><i class="icon-edit icon-white"></i> 编辑案例</a>
  	<?php if($model->status == 0):?><a href="<?php echo $this->createUrl('check',array('id'=>$model->id))?>" class="btn btn-primary"><i class="icon-ok-sign icon-white"></i> 提交审核</a><?php endif;?>
  </div>
</div>
<?php if($model->status == 1):?>
	<p class="alert">已提交审核，请等待审核结果；</p>
	<?php endif;?>
<ul class="nav nav-tabs" id="child_info">
  <li class="active"><a href="#basic_info">基本信息</a></li>
  <li><a href="#medical_assessment">医疗评估</a></li>
  <li><a href="#surgery_economic">手术预算和资助情况</a></li>
  <li><a href="#fbg">家庭背景</a></li>
  <li><a href="#pic">照片</a></li>
  <li><a href="#mbg">病史</a></li>
  <li><a href="#casesummary">结案及术后</a></li>
  <li><a href="#appfiles">申请表</a></li>
</ul>
<div class="tab-content">
  <div class="tab-pane active" id="basic_info">
		  <div class="row-fluid">
		  	<div class="span2">
		  		<?php $model->avatar = empty($model->avatar)?"noavatar.jpg":$model->avatar?>
			    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/uploads/avatar/'.$model->avatar,"avatar",array("width"=>120)); ?>
		  	</div>
		  	<div class="span10">
		  		<table class="table table-bordered personal-tb">
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
		民族
	</th>
	<td colspan="2">
		<?php echo CHtml::encode($model->nation); ?>
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
	<th>
		身份证号
	</th>
	<td colspan="4">
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
		出生地
	</th>
	<td>
		<?php echo CHtml::encode($model->home); ?>
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
	<td>
		<?php echo CHtml::encode($model->contact); ?>
	</td>
	<th>
		联系电话
	</th>
	<td colspan="6">
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
			<td><?php echo $f->r_label[$f->relationship]?></td>
			<td><?php echo $f->age;?></td>
			<td><?php echo $f->id_card;?></td>
			<td><?php echo $f->r_edu[$f->education];?></td>
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
					<td><?php echo $f->r_label[$f->relationship]?></td>
					<td><?php echo $f->age;?></td>
					<td><?php echo $f->id_card;?></td>
					<td><?php echo $f->r_edu[$f->education];?></td>
					<td><?php echo $f->nation;?></td>
					<td><?php echo $f->career;?></td>
					<td><?php echo $f->annual_income;?></td>
				</tr>
			<?php endif;?>
			<?php endforeach;?>
			</tbody>
		</table>
		<?php endif;?>
<h4>家庭经济情况说明</h4>
<table class="table table-bordered table-striped">
		<tbody>
		<tr>
		<th width="300" >主要经济情况来源</th>
		<td colspan="6"><?php echo CHtml::encode($model->economical_source_desc); ?></td>
		</tr>
		<tr>
		<th>特殊情况说明</th>
		<td colspan="6"><?php echo $model->special_desc; ?></td>
		</tr>
</table>
		<h4>病情描述</h4>
		<table class="table table-bordered table-striped">
		<tbody>
		<tr>
		<th width="300" >患儿病情描述</th>
		<td colspan="6"><?php echo $model->state_desc; ?></td>
		</tr>
		<tr>
		<th>是否有医疗保险及跨地区治疗报销比例</th>
		<td colspan="6"><?php echo CHtml::encode($model->medical_insurance_rate);if($model->medical_insurance_rate !="无" && $model->medical_insurance_rate !=null){echo "%";}; ?></td>
		</tr>
		<tr>
		<th>当地民政或其他形式的大病救助补贴</th>
		<td colspan="6"><?php echo CHtml::encode($model->other_subsidy); ?></td>
		</tr>
		<tr>
		<th>是否有家族遗传病、其他重大疾病（如有请详细说明）</th>
		<td colspan="6"><?php echo CHtml::encode($model->have_other_illness); ?></td>
		</tr>
		<tr>
		<th>是否在半年内患有肺炎（如有请详细说明肺炎治疗时间和治疗经过）</th>
		<td colspan="6"><?php echo CHtml::encode($model->have_pneumonia); ?></td>
		</tr>
		<tr>
		<th>手术医院</th>
		<td><?php echo CHtml::encode($model->operation_hospital); ?></td>
		<th>主治大夫</th>
		<td colspan="2"><?php echo CHtml::encode($model->doctor); ?></td>
		<th>是否一次性根治</th>
		<td><?php echo CHtml::encode($model->is_one_time_cure); ?></td>
		</tr>
		<tr>
			<th>第几次手术</th>
		<td><?php echo CHtml::encode($model->surgery_time); ?></td>
		<th>入院时间</th>
		<td><?php echo substr($model->admission_time,0,10); ?></td>
		<th>计划手术时间</th>
		<td colspan="2"><?php echo substr($model->operation_plan_time,0,10); ?></td>
		</tr>
		</tbody>
		</table>
	</div>
</div>
</div>
<div class="tab-pane" id="surgery_economic">
	<?php 

$o = array();

foreach ($orgs as $org) {
	$o[$org->id] = $org->name;
}

$fees = $model->budget;
$budget = array();
$cost = array();

$total_cost;
$total_hospital_cost;
$total_budget;
$total_hospital_budget;
$last_date = null;

foreach ($fees as $fee) {
	if($fee->fee_type == 0){
		if($fee->type == 'hospital_budget'){
			$budget['hospital'][] = $fee;
			$total_hospital_budget += $fee->amount;
		}else if($fee->type == 'our_budget'){
			$budget['our'][] = $fee;
			$total_budget += $fee->amount;
		  $last_date = $fee->last_date?$fee->last_date:$last_date;
		}else if($fee->type == 'org_budget'){
			$budget['org'][] = $fee;
			$total_budget += $fee->amount;
		  $last_date = $fee->last_date?$fee->last_date:$last_date;
		}
	}else if($fee->fee_type == 1){
		if($fee->type == 'hospital_cost'){
			$cost['hospital'][] = $fee;
			$total_hospital_cost += $fee->amount;
		}else if($fee->type == 'our_cost'){
			$cost['our'][] = $fee;
			$total_cost += $fee->amount;
		}else if($fee->type == 'org_cost'){
			$cost['org'][] = $fee;
			$total_cost += $fee->amount;
		}
	}
}


$rest_budget = $total_hospital_budget - $total_budget;

$rest_cost =  $total_cost - $total_hospital_cost;

?>
<legend>预算表</legend>
<table class="table table-bordered personal-tb">
	<thead>
	<tr>
		<th>医院</th>
		<th>数额</th>
		<th>备注</th>
		<th>预算日期</th>
	</tr>
	</thead>
	<tbody>
		<?php if(isset($budget['hospital']) && count($budget['hospital']) > 0 ){?>
		<?php foreach ($budget['hospital'] as $b) {?>
		<tr>
			<td>
				<?php echo $o[$b->source];?>
			</td>
			<td class="text-error">
				<?php echo $b->amount;?> 元
			</td>
			<td>
				<?php echo $b->note;?>
			</td>
			<td>
				<?php echo substr($b->last_date,0,10);?>
			</td>
		</tr>
		<?php }}?>
	</tbody>
	<thead>
	<tr>
		<th>机构</th>
		<th>数额</th>
		<th>备注</th>
		<th>截至 <?php echo substr($last_date,0,10);?></th>
	</tr>
	</thead>
	<tbody>
		<?php if(isset($budget['org']) && count($budget['org']) > 0 ){?>
		<?php foreach ($budget['org'] as $b) { ?>
		<tr>
			<td>
				<?php echo $o[$b->source];?> 
			</td>
			<td class="text-info">
				<?php echo $b->amount;?> 元
			</td>
			<td>
				<?php echo $b->note;?>
			</td>
			<td>
				<?php echo substr($b->last_date,0,10);?>
			</td>
		</tr>
		<?php }}?>
		<?php if(isset($budget['our']) && count($budget['our']) > 0 ){?>
		<?php foreach ($budget['our'] as $b) {?>
		<tr>
			<td>
				<?php if($b->source == 0){echo "海星意向";}else{ echo $o[$b->source];}?>
			</td>
			<td class="text-info">
				<?php echo $b->amount;?> 元
			</td>
			<td>
				<?php echo $b->note;?>
			</td>
			<td>
			</td>
		</tr>
		<?php }}?>
		<tr class="error">
			<td colspan="4" class="text-error">
				最终缺口：<?php echo $rest_budget;?> 元
			</td>
		</tr>
	</tbody>
</table>
<hr>
<legend>结案表</legend>
<table class="table table-bordered personal-tb">
	<thead>
	<tr>
		<th>医院</th>
		<th>数额</th>
		<th>备注</th>
		<th>结账日期</th>
	</tr>
	</thead>
	<tbody>
		<?php if(isset($cost['hospital']) && count($cost['hospital']) > 0 ){?>
		<?php foreach ($cost['hospital'] as $b) {?>
		<tr>
			<td>
				<?php echo $o[$b->source];?>
			</td>
			<td class="text-error">
				<?php echo $b->amount;?> 元
			</td>
			<td>
				<?php echo $b->note;?>
			</td>
			<td>
				<?php echo substr($b->last_date,0,10);?>
			</td>
		</tr>
		<?php }}?>
	</tbody>
	<thead>
	<tr>
		<th>机构</th>
		<th>数额</th>
		<th>备注</th>
		<th></th>
	</tr>
	</thead>
	<tbody>
		<?php if(isset($cost['org']) && count($cost['org']) > 0 ){?>
		<?php foreach ($cost['org'] as $b) {?>
		<tr>
			<td>
				<?php echo $o[$b->source];?>
			</td>
			<td class="text-success">
				<?php echo $b->amount;?> 元
			</td>
			<td>
				<?php echo $b->note;?>
			</td>
			<td>
			</td>
		</tr>
		<?php }}?>
		<?php if(isset($cost['our']) && count($cost['our']) > 0 ){?>
		<?php foreach ($cost['our'] as $b) {?>
		<tr>
			<td>
				<?php if($b->source == 0){echo "海星资助";}else{ echo $o[$b->source];}?>
			</td>
			<td class="text-success">
				<?php echo $b->amount;?> 元
			</td>
			<td>
				<?php echo $b->note;?>
			</td>
			<td>
			</td>
		</tr>
		<?php }}?>
		<tr class="success">
			<td colspan="4" class="text-success">
				结款总额：<?php echo $rest_cost;?> 元
			</td>
		</tr>
	</tbody>
</table>
</div>
<div class="tab-pane" id="medical_assessment">
	<?php 
if(count($model->medicalinfo) >0){
   foreach ($model->medicalinfo as $key => $medical) {
?>
	<h3><?php echo $medical->title?></h3>
	<p><?php echo $medical->content?></p>
	<hr>
<?php
   }}
?>
</div>

  <?php foreach($topics as $t){?>
  <div class="tab-pane" id="<?php echo $t;?>">
  	<?php if(count($model->files) >0):?>
  	<ul class="thumbnails">
		<?php $d = 0; foreach($model->files as $f):?>
		<?php if($f->getCate() == $t):?>
    <li class="span3">
      <div class="thumbnail">
      	<div class="img-thumb">
      	<a class="files" href="<?php echo IMG_CLOUD.'/case/'.$folder_type[$model->status].'/'.$f->path;?>">
      	<?php  $d++;
      if(in_array($f->getExt(),$img_exts)){
			  echo CHtml::image(IMG_CLOUD.'/case/'.$folder_type[$model->status].'/'.$f->path,"file",array("width"=>300,"height"=>195)); 
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
          <h4><?php echo $f->title?$f->title:"noname";?></h4>
          <span class="label label-info"><?php echo FileArray::getLabel($f->key);?></span>
          <p><?php echo $f->desc;?></p>
        </div>
      </div>
    </li>
   	<?php if($d!=0 && $d%4 == 0){?>
   	</ul><ul class="thumbnails">
   	<?php }?>
		<?php endif;?>
    <?php endforeach;?>
		</ul>
		<?php endif;?>
  </div>
	<?php }?>
</div>


<?php
    $baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCssFile($baseUrl."/js/vendor/colorbox/colorbox.css");
    $cs->registerScriptFile($baseUrl.'/js/vendor/colorbox/jquery.colorbox-min.js',CClientScript::POS_END);
    $cs->registerScript('update-detail', '
    $(function(){
      $(".files").colorbox({ innerWidth:500});
    })', CClientScript::POS_END);
?>


<script>
  $(function () {
    $('#child_info a').click(function (e) {
		  e.preventDefault();
		  $(this).tab('show');
		})
  })
</script>

