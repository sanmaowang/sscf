<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="language" content="en" />
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  <?php Yii::app()->bootstrap->register(); ?>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.min.css" />
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="brand" href="<?php echo $this->createUrl('site/index'); ?>"><?php echo Yii::app()->name; ?></a>
        <?php if(!Yii::app()->user->isGuest):?>
        <ul class="nav">
          <li<?php if ($this->code == 'Childcase') echo ' class="active"'; ?>><a href="<?php echo $this->createUrl('childcase/index'); ?>">案例</a></li>
          <?php if(Yii::app()->user->isAdmin()):?>
          <li<?php if ($this->code == 'user') echo ' class="active"'; ?>><a href="<?php echo $this->createUrl('user/index'); ?>">志愿者</a></li>
          <!--<li<?php if ($this->code == 'donor') echo ' class="active"'; ?>><a href="<?php echo $this->createUrl('user/index'); ?>">捐赠者</a></li>-->
          <li<?php if ($this->code == 'Org') echo ' class="active"'; ?>><a href="<?php echo $this->createUrl('org/index'); ?>">合作机构</a></li>
          <?php endif;?>
        </ul>
        <div class="btn-group pull-right">
          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-user"></i> 
            <b><?php echo Yii::app()->user->name;?></b> <span class="label"><?php echo Yii::app()->user->getRoleLabel();?></span>
             <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo $this->createUrl('member/index'); ?>"  title="个人设置">账户设置</a></li>
            <li><a href="<?php echo $this->createUrl('site/logout'); ?>"  title="退出">退出登录</a></li>
          </ul>
        </div>
      <?php endif;?>
    </div>
  </div>
</div>


<div class="container" id="page">

  <?php if(isset($this->breadcrumbs)):?>
    <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
      'links'=>$this->breadcrumbs,
    )); ?><!-- breadcrumbs -->
  <?php endif?>

  <?php echo $content; ?>

  <div class="clear"></div>
  <div id="note_comment">
    <span class="text-error"><i class="icon-edit"></i> Feedback: </span> <a href="#" id="write_comment">有问题? 点这里留言..</a>
  </div>
  <div id="disqus_thread"></div>
  <script type="text/javascript">
  /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
  var disqus_shortname = 'seastarchildren'; // required: replace example with your forum shortname

  /* * * DON'T EDIT BELOW THIS LINE * * */
  (function() {
      var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
      dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
      (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
  
  </script>

  <div id="footer">
    <hr>
    &copy; <?php echo date('Y'); ?> Copyright by Sea Star Children‘s Foundation.
  </div><!-- footer -->

</div><!-- page -->

</body>
</html>
