<div class="sidebar">
	<ul class="menuleft">
    	<li class="<?php echo ($act=='home') ? 'current' : '';?>"><a href="<?php echo admin_url();?>" class="home png">Home</a></li>
    	
        <li class="menu4"><a href="#" class="user png">Customers</a></li>
        <li class="sub4" ><a href="<?php echo admin_url();?>/new-customers" class="<?php echo ($act=='new') ? 'current' : '';?>" >New Customers</a></li>
        <li class="sub4" ><a href="<?php echo admin_url();?>/processing-customers" class="<?php echo ($act=='processing') ? 'current' : '';?>" >Processing</a></li>
        <li class="sub4" ><a href="<?php echo admin_url();?>/finish-customers" class="<?php echo ($act=='finish') ? 'current' : '';?>" >Finish</a></li>
        <li class="sub4" ><a href="<?php echo admin_url();?>/refund-customers" class="<?php echo ($act=='refund') ? 'current' : '';?>" >Refund</a></li>
        <li class="sub4" ><a href="<?php echo admin_url();?>/deleted-customers" class="<?php echo ($act=='deleted') ? 'current' : '';?>" >Junk</a></li>
        
        <li class="<?php echo ($act=='menu') ? 'current' : '';?>"><a href="<?php echo admin_url();?>/menu" class="adv png">Menu</a></li>
        
        <li class="<?php echo ($act=='email') ? 'current' : '';?>"><a href="<?php echo admin_url();?>/email" class="cate png">Email template</a></li>
        
        <li class="menu5"><a href="#" class="article png">Faqs</a></li>
        <li class="sub5" ><a href="<?php echo admin_url();?>/faqs" class="<?php echo ($act=='faqs') ? 'current' : '';?>" >Faq</a></li>
        <li class="sub5" ><a href="<?php echo admin_url();?>/faqs-category" class="<?php echo ($act=='fcate') ? 'current' : '';?>" >Faq Category</a></li>
        
        <li class="menu6"><a href="#" class="article png">Questions</a></li>
        <li class="sub6" ><a href="<?php echo admin_url();?>/question" class="<?php echo ($act=='question') ? 'current' : '';?>" >Question</a></li>
        <li class="sub6" ><a href="<?php echo admin_url();?>/question-category" class="<?php echo ($act=='qcate') ? 'current' : '';?>" >Question Category</a></li>
        
        <li class="menu7"><a href="#" class="article png">Contents</a></li>
        <li class="sub"><a href="<?php echo admin_url();?>/page" class="<?php echo ($act=='page') ? 'current' : '';?>" >Page</a></li>
        <li class="sub"><a href="<?php echo admin_url();?>/category" class="<?php echo ($act=='category') ? 'current' : '';?>">Category</a></li>
        
        <li class="menu8"><a href="#" class="article png">Country</a></li>
        <li class="sub8"><a href="<?php echo admin_url();?>/country" class="<?php echo ($act=='country') ? 'current' : '';?>" >Country</a></li>
        <li class="sub8"><a href="<?php echo admin_url();?>/embassy" class="<?php echo ($act=='embassy') ? 'current' : '';?>">Embassy</a></li>
        <li class="sub8"><a href="<?php echo admin_url();?>/country/change-list" class="<?php echo ($act=='change_list') ? 'current' : '';?>">Allow To Vietnam</a></li>
       
        <li class="<?php echo ($act=='slider') ? 'current' : '';?>"><a href="<?php echo admin_url();?>/slider" class="event png">Slider</a></li>
        
        <li class="<?php echo ($act=='testimonials') ? 'current' : '';?>"><a href="<?php echo admin_url();?>/testimonials" class="event png">Testimonials</a></li>
        
        <li><a href="#" class="video png">Fee manage</a></li>
        
        <li class="<?php echo ($act=='tags') ? 'current' : '';?>"><a href="<?php echo admin_url();?>/tags" class="key png">Meta Tag</a></li>
        
        <li class="<?php echo ($act=='adminstrators') ? 'current' : '';?>"><a href="<?php echo admin_url();?>/adminstrators-management" class="user png">Adminstrator</a></li>
        
        <li><a href="#" class="trash png">Trash</a></li>
    </ul>
</div>