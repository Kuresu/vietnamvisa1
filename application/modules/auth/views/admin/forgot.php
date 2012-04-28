<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin-Login</title>
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>public/admin/css/style_admin.css" />
</head>

<body>
<div class="header">
	<div id="logo"><a href="javascript:;"><img src="<?php echo base_url();?>public/admin/img/logo.png" class="png" /></a></div>
</div>

<div class="mainlogin">
	<div class="bgform">
    	<div class="bgform_in">
        	<h1 class="png">Forgot Password</h1>
        	<?php if(isset($error) && $error != ""){?>
            	<div class="error" style="width:96%; margin-left:5px; display:inline; color: red;"><h2><?php echo $error;?></h2></div>
            <?php }?>
            <?php $valid =  validation_errors(); if($valid == true){?>
				<div class="error" style="width:100%; margin-right:5px; display:inline; color: red;"><h2><?php echo validation_errors();?></h2></div>
			<?php }?>
			<?php if(isset($inform) && $inform !=""){?>
				<div class="success" style="width:100%; margin-right:5px; display:inline; color: green;"><h2><?php echo $inform;?></h2></div>
			<?php }?>
            <div class="bglogin">
            	<form action="<?php echo admin_url('forgot-password');?>" method="post">
	            	<ul>
	                	<li><input type="text" name="username" value="<?php echo (isset($username))?$username : "Username" ;?>" class="text" onfocus="if (this.value == 'Username') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Username';}" /></li>
	                    <li><input type="text" name="email" value="<?php echo (isset($email))?$email : "Email" ;?>" class="text" onfocus="if (this.value == 'Email') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Email';}" /></li>
	                    <li>
	                        <span class="right"><input type="submit" name="" value="" class="btnlogin png" /></span>
	                    </li>
	                    <li class="end">
	                    	<span class="left"><a href="<?php echo base_url();?>">Home</a></span>
	                        <span class="right"><a href="<?php echo admin_url();?>">Sign in</a></span>
	                    </li>
	                </ul>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>