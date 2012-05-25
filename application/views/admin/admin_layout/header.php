<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Admin-Contentmanage</title>
		<link type="text/css" rel="stylesheet" type="text/css" href="<?php echo css_link('style_admin.css','admin');?>" />
		<link rel="stylesheet" media="screen" type="text/css" href="<?php echo css_link('validationEngine.jquery.css', 'admin');?>" />
		<link rel="stylesheet" media="screen" type="text/css" href="<?php echo css_link('calendar.css', 'admin');?>" />
		
		
		<script type="text/javascript" src="<?php echo js_link('jquery-1.7.1.min.js','admin');?>"></script>
		<script type="text/javascript" src="<?php echo js_link('menu.js','admin');?>"></script>
		<script type="text/javascript" src="<?php echo js_link('form.js','admin');?>"></script>
		<script type="text/javascript" src="<?php echo js_link('adminstrator.js','admin');?>"></script>
		<script type="text/javascript" src="<?php echo js_link('common.js','admin');?>"></script>
		<script type="text/javascript" src="<?php echo js_link('hoverdiv.js','admin');?>"></script>
		<script type="text/javascript" src="<?php echo js_link('jquery.iframer.js','admin');?>"></script>
		<script type="text/javascript" src="<?php echo js_link('easyTooltip.js','admin');?>"></script>
		<script type="text/javascript" src="<?php echo js_link('tinyScrollbar.js','admin');?>"></script>
		<script type="text/javascript" src="<?php echo js_link('jquery.treeview.js','admin');?>"></script>
		<script type="text/javascript" src="<?php echo js_link('jquery.cookie.js','admin');?>"></script>
		<script type="text/javascript" src="<?php echo js_link('calendar.js','admin');?>"></script>
		
		
		<script type="text/javascript">
			var base_url = '<?php echo base_url(); ?>';
			var admin_url = '<?php echo admin_url().'/'; ?>';

			
			
		</script>
	</head>
	
	<body>
		<div class="header">
			<div id="logo"><a href="<?php echo admin_url();?>"><img src="<?php echo img_link('logo.png','admin');?>" class="png" /></a></div>
		    <div id="header_r">
		    	<em>Welcome</em> <b><?php $user = $this->session->userdata('user'); echo $user['username'];?> !</b>
		        <br />
		        <a href="<?php echo admin_url('change-password');?>">Change Password</a>|<a href="<?php echo admin_url('logout');?>">Logout</a>
		    </div>
		</div>