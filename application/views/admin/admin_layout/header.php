<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Admin-Contentmanage</title>
		<link type="text/css" rel="stylesheet" href="<?php echo css_link('style_admin.css','admin');?>" />
		<link rel="stylesheet" media="screen" type="text/css" href="<?php echo css_link('validationEngine.jquery.css', 'admin');?>" />
		
		<script type="text/javascript" src="<?php echo js_link('jquery-1.7.1.min.js','admin');?>"></script>
		<script type="text/javascript" src="<?php echo js_link('menu.js','admin');?>"></script>
		<script type="text/javascript" src="<?php echo js_link('form.js','admin');?>"></script>
		<script type="text/javascript" src="<?php echo js_link('adminstrator.js','admin');?>"></script>
		<script type="text/javascript" src="<?php echo js_link('common.js','admin');?>"></script>
		<script type="text/javascript" src="<?php echo js_link('hoverdiv.js','admin');?>"></script>
		<script type="text/javascript" src="<?php echo js_link('jquery.iframer.js','admin');?>"></script>
		<script type="text/javascript" src="<?php echo js_link('jquery.validationEngine.js','admin');?>" charset="utf-8"></script>
		<script type="text/javascript" src="<?php echo js_link('jquery.validationEngine-en.js','admin');?>" charset="utf-8"></script>
		
		<script type="text/javascript">
			var base_url = '<?php echo base_url(); ?>';
			var admin_url = '<?php echo admin_url(); ?>/';
			$().ready(function(){
				$(".menu1").click(function(){$("#sub1").slideToggle('slow');});
				$(".menu2").click(function(){$("#sub2").slideToggle('slow');});
				$(".menu3").click(function(){$("#sub3").slideToggle('slow');});
				$(".menu4").click(function(){$("#sub4").slideToggle('slow');});
				$(".menu5").click(function(){$("#sub5").slideToggle('slow');});
				$(".menu6").click(function(){$(".sub").slideToggle('slow');});
				$(".menu7").click(function(){$("#sub7").slideToggle('slow');});
				$(".menu8").click(function(){$("#sub8").slideToggle('slow');});
				$(".menu9").click(function(){$("#sub9").slideToggle('slow');});
				$(".menu10").click(function(){$("#sub10").slideToggle('slow');});
			});
		</script>
	</head>
	
	<body>
		<div class="header">
			<div id="logo"><a href="javascript:;"><img src="<?php echo img_link('logo.png','admin');?>" class="png" /></a></div>
		    <div id="header_r">
		    	<em>Welcome</em> <b><?php $user = $this->session->userdata('user'); echo $user['username'];?> !</b>
		        <br />
		        <a href="<?php echo admin_url('change-password');?>">Change Password</a>|<a href="<?php echo admin_url('logout');?>">Logout</a>
		    </div>
		</div>