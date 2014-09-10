<?php
$this->breadcrumbs=array(
	'Receipts'=>array('list'),
	$file->name,
);
$this->menu=array(
  array('label'=>'Operation'),
  array('label'=>'Donors','icon'=>'user', 'url'=>array('donor/index')),
  array('label'=>'Receipts','icon'=>'file', 'url'=>array('receipt/list'),'active'=>true),
);
?>

<h1>Add Owner</h1>
<p>hand file #<?php echo $file->name; ?> to Someone..</p>
<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'file-hand-form',
    'type'=>'horizontal',
)); ?>
 
<fieldset>
 
    <legend><?php echo $file->name;?></legend>
    <div class="control-group ">
      <label class="control-label" for="DonorReceipt_donor_id">选择用户</label>
      <div class="controls">
        <select multiple="multiple" name="DonorReceipt[donor_id][]" id="DonorReceipt_donor_id">
          <?php foreach ($users as $key => $user) {?>
            <option value="<?php echo $user->id;?>" <?php if(in_array($user->id,$owners)){?>selected="selected"<?php }?>><?php echo $user->username;?></option>
          <?php }?>
        </select>
      </div>
    </div>
 
</fieldset>
 
<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>
 
<?php $this->endWidget(); ?>