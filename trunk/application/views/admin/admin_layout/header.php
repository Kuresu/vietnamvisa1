<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Admin-Contentmanage</title>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>public/admin/css/style_admin.css" />
		<link rel="stylesheet" media="screen" type="text/css" href="<?php echo css_link('validationEngine.jquery.css');?>" />
		
		<script type="text/javascript" src="<?php echo base_url();?>public/admin/js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>public/admin/js/menu.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>public/admin/js/jquery.validationEngine.js" charset="utf-8"></script>
		<script type="text/javascript" src="<?php echo base_url();?>public/admin/js/jquery.validationEngine-en.js" charset="utf-8"></script>
		
		<script type="text/javascript">
			$().ready(function(){
				$(".menu1").click(function(){$("#sub1").slideToggle('slow');});
				$(".menu2").click(function(){$("#sub2").slideToggle('slow');});
				$(".menu3").click(function(){$("#sub3").slideToggle('slow');});
				$(".menu4").click(function(){$("#sub4").slideToggle('slow');});
				$(".menu5").click(function(){$("#sub5").slideToggle('slow');});
				$(".menu6").click(function(){$("#sub6").slideToggle('slow');});
				$(".menu7").click(function(){$("#sub7").slideToggle('slow');});
				$(".menu8").click(function(){$("#sub8").slideToggle('slow');});
				$(".menu9").click(function(){$("#sub9").slideToggle('slow');});
				$(".menu10").click(function(){$("#sub10").slideToggle('slow');});
			});
		</script>
		<script type="text/javascript" src="js/hoverdiv.js"></script>
	</head>
	
	<body>
		<div class="header">
			<div id="logo"><a href="javascript:;"><img src="<?php echo base_url();?>public/admin/img/logo.png" class="png" /></a></div>
		    <div id="header_r">
		    	<em>Welcome</em> <b><?php $user = $this->session->userdata('user'); echo $user['username'];?> !</b>
		        <br />
		        <a href="<?php echo base_url();?>home_admin/change-password">Change Password</a>|<a href="<?php echo base_url();?>home_admin/logout">Logout</a>
		    </div>
		</div>