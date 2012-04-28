<div class="sidebar">
	<ul class="menuleft">
    	<li class="<?php echo ($act=='home') ? 'current' : '';?>"><a href="<?php echo base_url();?>home_admin" class="home png">Home</a></li>
        <li><a href="#" class="user png">Customers</a></li>
        <li><a href="#" class="user png">Email template</a></li>
        <li><a href="#" class="cate png">Faqs</a></li>
        <li><a href="#" class="article png">Questions</a></li>
        <li class="menu6"><a href="#" class="article png">Contents</a></li>
        <li class="sub current"><a href="<?php echo admin_url();?>/page" class="<?php echo ($act=='page') ? 'current' : '';?>" >Pages</a></li>
        <li class="sub"><a href="<?php echo admin_url();?>/category" class="<?php echo ($act=='category') ? 'current' : '';?>">Categories</a></li>
        <li><a href="#" class="article png">Country manage</a></li>
        <li><a href="#" class="event png">Slide manage</a></li>
        <li><a href="#" class="video png">Fee manage</a></li>
        <li><a href="#" class="key png">Meta tags</a></li>
        <li class="<?php echo ($act=='adminstrators') ? 'current' : '';?>"><a href="<?php echo base_url();?>home_admin/adminstrators-management" class="adv png">Adminstrators</a></li>
        <li><a href="#" class="trash png">Trash</a></li>
    </ul>
</div>