<?php
$this->breadcrumbs=array(
	'Files'=>array('index'),
	$file->name,
);

$this->menu=array(
	array('label'=>'Operation'),
  array('label'=>'My File', 'icon'=>'file', 'url'=>array('index')),
  array('label'=>'List File', 'icon'=>'list', 'url'=>array('list'),'visible'=>Yii::app()->user->isAdmin()),
  array('label'=>'Create File', 'icon'=>'plus', 'url'=>array('create'),'visible'=>Yii::app()->user->isAdmin()),
  array('label'=>'Manage File', 'icon'=>'pencil', 'url'=>array('admin'),'visible'=>Yii::app()->user->isAdmin()),
);
?>

<h1>Hand File</h1>
<p>hand file #<?php echo $file->name; ?> to Someone..</p>
<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'file-hand-form',
    'type'=>'horizontal',
)); ?>
 
<fieldset>
 
    <legend><?php echo $file->name;?></legend>
    <div class="control-group ">
      <label class="control-label" for="UserFile_user_id">选择用户</label>
      <div class="controls">
        <select multiple="multiple" name="UserFile[user_id][]" id="UserFile_user_id">
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