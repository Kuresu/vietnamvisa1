<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'controllers/admin_controller'.EXT);
class Menu_admin extends Admin_controller {
	
	
	function __construct(){
        parent::__construct(); 
       	$this->load->model(array('admin/menu_model'));
        $this->load->library(array('session','upload'));
		$this->load->helper(array('link'));
    }
    
    
    function index(){
    	#get filter_parent
    	if(isset($_REQUEST['item_parent'])) {
    		$filter_parent	= $_REQUEST['item_parent'];
    		$this->session->set_userdata('filter_menu_parent',$filter_parent);
    	} else {
    		if($this->session->userdata('filter_menu_parent')) {
    			$filter_parent = $this->session->userdata('filter_menu_parent');
    		} else {
    			$filter_parent = '';
    			$this->session->set_userdata('filter_menu_parent',$filter_parent);
    		}
    	}
    	
    	#get number item on perpage.
    	if(isset($_REQUEST['perpage'])) {
    		$perpage		= 	$_REQUEST['perpage'];
    		$this->session->set_userdata('item_perpage',$perpage);
    	} else {
    		if($this->session->userdata('item_perpage')) {
    			$perpage	= 	$this->session->userdata('item_perpage');
    		} else {
    			$perpage 	= 	'all';
    			$this->session->set_userdata('item_perpage',$perpage);
    		}
    	}
    	
    	#get total item in DB.
    	$total_cate					= 	$this->menu_model->get_menu_filter($filter_parent);
    	$this->load->library('pagination');
    	$config['total_rows'] 		= 	$total_cate;
    	$config['per_page'] 		= 	$perpage;
    	$config['first_link']		= 	'First';
    	$config['last_link']		= 	'Last';
    	$config['next_link']		= 	'Next »';
    	$config['prev_link']		= 	'« Prev';
    	$config['first_tag_open']	= 	'<span>';
    	$config['first_tag_close']	= 	'</span>';
    	$config['last_tag_open']	= 	'<span>';
    	$config['last_tag_close']	= 	'</span>';
    	$config['num_tag_open']		= 	'<span style="padding:0 2px 0 2px">';
    	$config['num_tag_close']	= 	'</span>';
    	$config['num_links']		= 	4;
    	$config['cur_tag_open']		= 	'<a class="currentpage">';
    	$config['cur_tag_close']	= 	'</a>';
    	$config['base_url']			= 	admin_url().'/menu/';
    	$config['uri_segment']		= 	3;
    	$this->pagination->initialize($config);
    	
    	$pagination					= 	$this->pagination->create_links();
    	$offset 					= 	($this->uri->segment(3)=='') ? 0 : $this->uri->segment(3);
    	
    	#get info.
    	$list						= 	$this->menu_model->get_menu_list($filter_parent, $perpage, $offset);
    	$cate_info					=	$this->menu_model->get_tree();
    	$delete_menu				=	$this->session->userdata('delete_menu');
    	$this->session->unset_userdata('delete_menu');
    	 
    	if(isset($delete_menu) && $delete_menu == 'delete'){
    		$inform	=	'delete menu success';
    	}else {
    		$inform = "";
    	}
    	
    	#assign data.
    	$data['current_filter_parent']	= $this->session->userdata('filter_menu_parent');
    	$data['current_perpage']		=	$perpage;
    	$data['menu_list']				=	$list;
    	$data['pagination']				=	$pagination;
    	$data['inform']					=	$inform;
    	$data['cate_info']				=	$cate_info;
    	
    	$data['act']					=	"menu";
    	$data['tpl_file']				=	"admin/index";
    	$this->load->view('admin/admin_layout/index', $data);
    }
    
    
    function add(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    			
    		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('url', 'Url', 'trim|xss_clean');
    	
    		if($this->form_validation->run() == TRUE){
    			$info = array(
    	                				'name'   		=> $this->input->post('name'),
    				                    'name_ascii'   	=> ascii_link($this->input->post('name')),
    									'name'   		=> $this->input->post('name'),
    				                    'active'	 	=> $this->input->post('status'),
    									'on_top'   		=> $this->input->post('on_top'),
    									'on_menubar'   	=> $this->input->post('on_menubar'),
    									'at_bottom'   	=> $this->input->post('at_bottom'),
    				                    'parent_id'		=> $this->input->post('parent'),
    				                    'url'			=> $this->input->post('url'),
    				                    'order'			=> $this->input->post('order')
    						);
    	
    			if($this->menu_model->check_exist($info['name'])) {
    				die('This name is exist!');
    			}elseif ($this->menu_model->check_order_exist($info['order'])){
    				die('This order is exist !');	
    			}else{
    				$this->menu_model->add_menu($info);
    				die('yes');
    			}
    		}else {
    			die(validation_errors());
    		}
    	}
    	
    	$data['tree_cate']		=	$this->menu_model->get_tree();	
    	$data['hello']			=	"";
        $this->load->view('admin/add', $data);
    }
    
    
    function edit($menu_id	=	''){
    	if($_SERVER['REQUEST_METHOD'] == 'POST'){
    		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('url', 'Url', 'trim|xss_clean');
    		
    		if($this->form_validation->run() == TRUE){
    			$info = array(
    		    	                	'name'   		=> $this->input->post('name'),
    				                    'name_ascii'   	=> ascii_link($this->input->post('name')),
    									'name'   		=> $this->input->post('name'),
    				                    'active'	 	=> $this->input->post('status'),
    									'on_top'   		=> $this->input->post('on_top'),
    									'on_menubar'   	=> $this->input->post('on_menubar'),
    									'at_bottom'   	=> $this->input->post('at_bottom'),
    				                    'parent_id'		=> $this->input->post('parent'),
    				                    'url'			=> $this->input->post('url'),
    				                    'order'			=> $this->input->post('order')
    						 );
    			 
    			if($this->menu_model->check_exist_edit($menu_id, $info['name'])) {
    				die('This username is exist!');
    			}elseif ($this->menu_model->check_order_exist_edit($menu_id, $info['order'])){
    				die('This order is exist !');
    			}else{
    				$this->menu_model->edit_category($menu_id, $info);
    				die('yes');
    			}
    		}else {
    			die(validation_errors());
    		}
    	}
    	
    	$data['tree_cate']	=	$this->menu_model->get_tree_edit($menu_id);
    	$data['menu_info']	=	$this->menu_model->get_match($menu_id);
    	$data['hello']		=	"";
    	$this->load->view('admin/edit', $data);
    }
    
    
    function delete($cate_id){
    	#check if this cate are parents or not => get all list of its children.
    	$children	=	$this->menu_model->get_tree_by_parent($cate_id);
    	
    	if($children){
    		#check each category those hold pages inside.
	    	foreach ($children as $c_k => $c_v){
		    	#check pages match with this cate.
		    	$page	=	$this->menu_model->get_page_match($c_v->id);
		    	if($page){
		    		foreach ($page as $k => $v){
		    			#check if a page have been belong to how many cate?
		    			$category_id	=	explode('|', $v->cate_id);
		    			$list_cate_id			=	array();
		    			$list_cate_name			=	array();
		    			#if page have been belong more than one category.
		    			if(count($category_id)>3){
		    				#update cate_id and cate_name for each page
		    				for ($i=1; $i<count($category_id)-1; $i++){
		    					if($c_v->id != $category_id[$i]){
		    						$list_cate_id[]		=	$category_id[$i];
		    						$match_cate			=	$this->menu_model->get_match($category_id[$i]);
		    						if($match_cate){
		    							$list_cate_name[]	=	$match_cate->name;
		    						}
		    					}
		    				}# end for
		    				
		    				if(count($list_cate_id)>1){$new_cate_id	=	implode('|', $list_cate_id);}else {$new_cate_id = $list_cate_id[0];}
		    				if(count($list_cate_name)>1){$new_cate_name	=	implode('|', $list_cate_name);}else {$new_cate_name = $list_cate_name[0];}
		
		    				$info			=	array(
		    											'cate_id'	=> 	'|'.$new_cate_id.'|',
		    											'cate_name'	=>	'|'.$new_cate_name.'|'
		    										 );
		    				$this->menu_model->update_page($v->id, $info);
		    			}else{
		    				$this->menu_model->delete_page($v->id);
		    			}# end if(count)
		    			
		    		}# end foreach($page)
		    	}# end if($page)
	    	}# end foreach($children)
	    	
	    	#update the father for match pages.
	    	
	    	$page	=	$this->menu_model->get_page_match($cate_id);
	    	if($page){
	    		foreach ($page as $k => $v){
	    			#check if a page have been belong to how many cate?
	    			$category_id			=	explode('|', $v->cate_id);
		    		$list_cate_id			=	array();
		    		$list_cate_name			=	array();
		    		#if page have been belong more than one category.
	    			if(count($category_id)>3){
	    				#update cate_id and cate_name for each page
	    				for ($i=1; $i<count($category_id)-1; $i++){
	    					if($cate_id != $category_id[$i]){
    							$list_cate_id[]		=	$category_id[$i];
    							$match_cate			=	$this->menu_model->get_match($category_id[$i]);
    							if($match_cate){
		    							$list_cate_name[]	=	$match_cate->name;
		    						}
		    						
		    					}
		    				}# end for
		    			if(count($list_cate_id)>1){$new_cate_id	=	implode('|', $list_cate_id);}else {$new_cate_id = $list_cate_id[0];}
			    		if(count($list_cate_name)>1){$new_cate_name	=	implode('|', $list_cate_name);}else {$new_cate_name = $list_cate_name[0];}
		    			
		    			$info			=	array(
		    										'cate_id'	=> 	'|'.$new_cate_id.'|',
		    	    							    'cate_name'	=>	'|'.$new_cate_name.'|'
		    	    							 );
		    	    	$this->menu_model->update_page($v->id, $info);
		    		}else{
		    			$this->menu_model->delete_page($v->id);
		    		}# end if(count)
	    		}# end foreach
	    	}# end if($page)
    	}else {
    		#check pages match with this cate.
    		$page	=	$this->menu_model->get_page_match($cate_id);
    		if($page){
    			foreach ($page as $k => $v){
    				#check if a page have been belong to how many cate?
    				$category_id	=	explode('|', $v->cate_id);
    				$list_cate_id			=	array();
    				$list_cate_name			=	array();
    				#if page have been belong more than one category.
    				if(count($category_id)>3){
    					#update cate_id and cate_name for each page
    					for ($i=1; $i<count($category_id)-1; $i++){
	    					if($cate_id != $category_id[$i]){
	    						$list_cate_id[]		=	$category_id[$i];
	    						$match_cate			=	$this->menu_model->get_match($category_id[$i]);
	    						if($match_cate){
	    							$list_cate_name[]	=	$match_cate->name;
	    						}
	    					}
    					}# end for
    					if(count($list_cate_id)>1){$new_cate_id	=	implode('|', $list_cate_id);}else {$new_cate_id = $list_cate_id[0];}
    					if(count($list_cate_name)>1){$new_cate_name	=	implode('|', $list_cate_name);}else {$new_cate_name = $list_cate_name[0];}
    					
    					$info			=	array( 
    							    				'cate_id'	=> 	'|'.$new_cate_id.'|',
    							    				'cate_name'	=>	'|'.$new_cate_name.'|'
    											 );
    					$this->menu_model->update_page($v->id, $info);
    				}else{
    					$this->menu_model->delete_page($v->id);
    				}# end if(count)
    			}# end foreach
    		}# end if($page)
    	}# end if($children).
    	
    	#delete in DB.
    	$this->menu_model->delete($cate_id);
    	$delete	=	"delete";
    	$this->session->set_userdata('delete_cate', $delete);
    	redirect(admin_url('category'),'refresh');
    }
    
    
    
    function change_status(){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$id     		= $this->input->post('id');
    		$status 		= $this->input->post('status');
    			
    		$info			=	array();
    		$info['active']	=	$status;
    			
    		$this->menu_model->change_status($id, $info);
    		die('yes');
    	}
    }
    
    
    
    function load_row($id = ''){
    	 
    	$data['menu'] = $this->menu_model->get_match($id);
    	$this->load->view('admin/row', $data);
    }
    
    
    function do_action(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    		 
    		$id_list = $this->input->post('id');
    		$action  = $this->input->post('action');
    		
			if($action == 'suspend') {
    			$this->menu_model->update_many($id_list, array('active' => 'no'));
    		}
    		elseif($action == 'active') {
    			$this->menu_model->update_many($id_list, array('active' => 'yes'));
    		}
    		 
    		die('yes');
    	}
    }
    
    
    function change_order() {
    	$menu_id 	= 	$this->input->post('menu_id');
    	$order 		= 	$this->input->post('menu_order');
    	
    	$menu 		= 	$this->menu_model->get_match($menu_id); //cate will be changed order position.
    	$menu_order = 	$this->menu_model->get_match_order($order); // Check 'order' exists or not?
    	
    	if (count($menu_order) > 0) {
    		$this->menu_model->update_order($menu_order['id'], array('order' => $menu->order));
    		$this->menu_model->update_order($menu_id, array('order' => $order));
    			
    	} else {
    		$this->menu_model->update_order($menu_id, array('order' => $order));
    	}
    	
    	redirect(admin_url('menu'), 'refresh');
    }
    
    
    function search(){
		$keyword					=	$this->input->post('search');
    	#get info.
    	$search_list				= 	$this->menu_model->get_search_list($keyword);
    	
    	#assign data.
    	$data['search_list']		=	$search_list;
    	$data['act']				=	"category";
    	$data['tpl_file']			=	"admin/search_index";
    	$this->load->view('admin/admin_layout/index', $data);	
    }
    
   
    
    
}
//End Page_admin