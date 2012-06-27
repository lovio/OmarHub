<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/liuzhan.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">
<!--
	<div id="header">
		<div id="logo"><?php //echo CHtml::encode(Yii::app()->name); ?></div>
	</div>
-->
	<div class="header">
	<div class="head_2">
			<div class="block_header">
			<div class="logo"><a href="index.html"><img src="images/logo.gif" alt="Home" width="345" height="58" border="0" /></a></div>

			<div class="Simple_text">
				<form id="form1" name="form1" method="post" action="">
					<label>
						<input name="search" type="text" id="search" size="35" />
					</label>
				</form>
			</div>
			<div class="Simple_text_img"><a href="#"><img src="images/ok.gif" alt="OK" width="30" height="18" border="0" /></a></div>
			<div class="clr"></div>
			<!--<a class="position_abslute" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=login/loginout">loginout</a>-->
		</div>
		<div class="menu">
		
		 <ul id="yw4">
		 	<li><a href="<?php echo Yii::app()->request->baseUrl ?>">UserProfile</a></li>
		 	<li><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=user">usermanager</a></li>
		 	<li><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=activity/createoffer">Create offer</a></li>
		 	<li><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=activity/createneed">Create need</a></li>
		 	<li><a href="<?php echo Yii::app()->request->baseUrl ?>/index.php?r=activity/createevent">Create event</a></li>

		 	<?php if(!Yii::app()->user->isGuest)
		 		echo '<li><a href="'.Yii::app()->request->baseUrl.'/index.php?r=login/logout">Logout</a></li>';
		 	?>
		
		 </ul>
		</div><!-- menu -->
		<div class="clr"></div>
		<div class="text">
			<div class="left_t"></div>
			<div class="right_t"><!--<a href="#"><img src="images/rss.gif" alt="RSS" width="31" height="21" border="0" align="right" /></a><a href="#"><img src="images/twitter.gif" alt="twitter" width="28" height="24" border="0" align="right" /></a>-->
			</div>
		</div>
	</div>
	</div><!--header-->

	<div class="clr"></div>

	<div class="body body_bg">
	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>
	<div class="clr"></div>
	
	</div>

	<div class="clear"></div>
	<div class="footer">
  <p align="center"><a href="#">home</a> <a href="#">services</a> <a href="#">portfolio</a> <a href="#">about</a> <a href="#">contact</a> <a href="#">rss feed</a> </p>
  <p align="center">? Copyright 2009. dreamtemplate.com. All Rights Reserved</p>
</div>


</div><!-- page -->

</body>
</html>
