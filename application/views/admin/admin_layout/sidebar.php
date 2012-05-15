<div class="sidebar">
	<ul class="menuleft">
    	<li class="<?php echo ($act=='home') ? 'current' : '';?>"><a href="<?php echo admin_url();?>" class="home png">Home</a></li>
    	
        <li><a href="#" class="user png">Customers</a></li>
        
        <li class="<?php echo ($act=='menu') ? 'current' : '';?>"><a href="<?php echo admin_url();?>/menu" class="adv png">Menu</a></li>
        
        <li><a href="#" class="cate png">Email template</a></li>
        
        <li class="menu5"><a href="#" class="article png">Faqs</a></li>
        <li class="sub5" ><a href="<?php echo admin_url();?>/faqs" class="<?php echo ($act=='faqs') ? 'current' : '';?>" >Faqs</a></li>
        <li class="sub5" ><a href="<?php echo admin_url();?>/faqs-category" class="<?php echo ($act=='fcate') ? 'current' : '';?>" >Faqs' Categories</a></li>
        
        <li class="menu6"><a href="#" class="article png">Questions</a></li>
        <li class="sub6" ><a href="<?php echo admin_url();?>/question" class="<?php echo ($act=='question') ? 'current' : '';?>" >Questions</a></li>
        <li class="sub6" ><a href="<?php echo admin_url();?>/question-category" class="<?php echo ($act=='qcate') ? 'current' : '';?>" >Question Category</a></li>
        
        <li class="menu7"><a href="#" class="article png">Contents</a></li>
        <li class="sub"><a href="<?php echo admin_url();?>/page" class="<?php echo ($act=='page') ? 'current' : '';?>" >Pages</a></li>
        <li class="sub"><a href="<?php echo admin_url();?>/category" class="<?php echo ($act=='category') ? 'current' : '';?>">Categories</a></li>
        
        <li><a href="#" class="article png">Country manage</a></li>
       
        <li class="<?php echo ($act=='slider') ? 'current' : '';?>"><a href="<?php echo admin_url();?>/slider" class="event png">Slider manage</a></li>
        
        <li><a href="#" class="video png">Fee manage</a></li>
        
        <li class="<?php echo ($act=='tags') ? 'current' : '';?>"><a href="<?php echo admin_url();?>/tags" class="key png">Meta tags</a></li>
        
        <li class="<?php echo ($act=='adminstrators') ? 'current' : '';?>"><a href="<?php echo admin_url();?>/adminstrators-management" class="user png">Adminstrators</a></li>
        
        <li><a href="#" class="trash png">Trash</a></li>
    </ul>
</div>