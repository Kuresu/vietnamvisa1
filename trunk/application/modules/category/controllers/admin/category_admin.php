<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ---------------------------------------------------------------
 * Author  : Anthony Tran
 * Email   : Incredibletran@gmail.com - Incredibletran@hotmail.com
 * Version : 1.0
 * ---------------------------------------------------------------
*/
require_once(APPPATH.'controllers/admin_controller'.EXT);
class Category_admin extends Admin_controller {
	
	
	function __construct(){
        parent::__construct(); 
       	$this->load->model(array('admin/category_model'));
        $this->load->library(array('session','upload'));
		$this->load->helper(array('link'));
    }
    
    
    function index(){
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
    	$total_cate					= 	count($this->category_model->get_all_cate());
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
    	$config['base_url']			= 	admin_url().'/category/';
    	$config['uri_segment']		= 	3;
    	$this->pagination->initialize($config);
    	
    	$pagination					= 	$this->pagination->create_links();
    	$offset 					= 	($this->uri->segment(3)=='') ? 0 : $this->uri->segment(3);
    	
    	#get info.
    	$cate_list					= 	$this->category_model->get_cate_list($perpage, $offset);
    	$delete_cate				=	$this->session->userdata('delete_cate');
    	$this->session->unset_userdata('delete_cate');
    	 
    	if(isset($delete_cate) && $delete_cate == 'delete'){
    		$inform	=	'delete cate success';
    	}else {
    		$inform = "";
    	}
    	
    	#assign data.
    	$data['current_perpage']	=	$perpage;
    	$data['cate_list']			=	$cate_list;
    	$data['pagination']			=	$pagination;
    	$data['inform']				=	$inform;
    	
    	$data['act']				=	"category";
    	$data['tpl_file']			=	"admin/index";
    	$this->load->view('admin/admin_layout/index', $data);
    }
    
    
    function add(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    			
    		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');
    	
    		if($this->form_validation->run() == TRUE){
    			$url	=	'category/'.ascii_link($this->input->post('name'));
    			$info = array(
    	                				'name'   		=> $this->input->post('name'),
    				                    'name_ascii'   	=> ascii_link($this->input->post('name')),
    				                    'status'	 	=> $this->input->post('status'),
    				                    'url'			=> $url,
    				                    'parent_id'		=> $this->input->post('parent'),
    				                    'order'			=> $this->input->post('order')
    						);
    	
    			if($this->category_model->check_exist($info['name'])) {
    				die('This username is exist!');
    			}elseif ($this->category_model->check_order_exist($info['order'])){
    				die('This order is exist !');	
    			}else{
    				$this->category_model->add_category($info);
    				die('yes');
    			}
    		}else {
    			die(validation_errors());
    		}
    	}
    	$data['tree_cate']	=	$this->category_model->get_tree();	
    	$data['hello']		=	"";
        $this->load->view('admin/add', $data);
    }
    
    
    function edit($cate_id	=	''){
    	if($_SERVER['REQUEST_METHOD'] == 'POST'){
    		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');
    		
    		if($this->form_validation->run() == TRUE){
    			$url	=	'category/'.ascii_link($this->input->post('name'));
    			$info = array(
    		    	                'name'   		=> $this->input->post('name'),
    		    				    'name_ascii'   	=> ascii_link($this->input->post('name')),
    		    				    'status'	 	=> $this->input->post('status'),
    		    				    'url'			=> $url,
    								'parent_id'		=> $this->input->post('parent'),
    		    				    'order'			=> $this->input->post('order')
    						 );
    			 
    			if($this->category_model->check_exist_edit($cate_id, $info['name'])) {
    				die('This username is exist!');
    			}elseif ($this->category_model->check_order_exist_edit($cate_id, $info['order'])){
    				die('This order is exist !');
    			}else{
    				$this->category_model->edit_category($cate_id, $info);
    				
    				#update those pages who have belong to this category.
    				$page	=	$this->category_model->get_page_match($cate_id);
    				if($page){
    					foreach ($page as $k => $v){
    						$category_id	=	explode('|', $v->cate_id);
    						$list_cate_id			=	array();
    						$list_cate_name			=	array();
    						#if page have been belong more than one category.
    						#update cate_id and cate_name for each page
    						for ($i=1; $i<count($category_id)-1; $i++){
    							if($v->id != $category_id[$i]){
    								$list_cate_id[]		=	$category_id[$i];
    								$match_cate			=	$this->category_model->get_match($category_id[$i]);
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
    						$this->category_model->update_page($v->id, $info);
    					}
    				}
    				die('yes');
    			}
    		}else {
    			die(validation_errors());
    		}
    	}
    	
    	$data['tree_cate']	=	$this->category_model->get_tree_edit($cate_id);
    	$data['cate_id']	=	$cate_id;
    	$data['cate_info']	=	$this->category_model->get_match($cate_id);
    	$data['hello']		=	"";
    	$this->load->view('admin/edit', $data);
    }
    
    
    function delete($cate_id){
    	#check if this cate are parents or not => get all list of its children.
    	$children	=	$this->category_model->get_tree_by_parent($cate_id);
    	
    	if($children){
    		#check each category those hold pages inside.
	    	foreach ($children as $c_k => $c_v){
		    	#check pages match with this cate.
		    	$page	=	$this->category_model->get_page_match($c_v->id);
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
		    						$match_cate			=	$this->category_model->get_match($category_id[$i]);
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
		    				$this->category_model->update_page($v->id, $info);
		    			}else{
		    				$this->category_model->delete_page($v->id);
		    			}# end if(count)
		    			
		    		}# end foreach($page)
		    	}# end if($page)
	    	}# end foreach($children)
	    	
	    	#update the father for match pages.
	    	
	    	$page	=	$this->category_model->get_page_match($cate_id);
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
    							$match_cate			=	$this->category_model->get_match($category_id[$i]);
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
		    	    	$this->category_model->update_page($v->id, $info);
		    		}else{
		    			$this->category_model->delete_page($v->id);
		    		}# end if(count)
	    		}# end foreach
	    	}# end if($page)
    	}else {
    		#check pages match with this cate.
    		$page	=	$this->category_model->get_page_match($cate_id);
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
	    						$match_cate			=	$this->category_model->get_match($category_id[$i]);
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
    					$this->category_model->update_page($v->id, $info);
    				}else{
    					$this->category_model->delete_page($v->id);
    				}# end if(count)
    			}# end foreach
    		}# end if($page)
    	}# end if($children).
    	
    	#delete in DB.
    	$this->category_model->delete($cate_id);
    	$delete	=	"delete";
    	$this->session->set_userdata('delete_cate', $delete);
    	redirect(admin_url('category'),'refresh');
    }
    
    
    
    function change_status(){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$id     = $this->input->post('category_id');
    		$status = $this->input->post('category_status');
    			
    		$info	=	array();
    		$info['status']	=	$status;
    			
    		$this->category_model->change_status($id, $info);
    		die('yes');
    	}
    }
    
    
    
    function load_row($id = ''){
    	 
    	$data['cate'] = $this->category_model->get_match($id);
    	$this->load->view('admin/row', $data);
    }
    
    
    function do_action(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    		 
    		$id_list = $this->input->post('id');
    		$action  = $this->input->post('action');
    		
    		if($action == 'delete') {
    			$this->category_model->delete_many($id_list);
    		}
    		elseif($action == 'suspend') {
    			$this->category_model->update_many($id_list, array('status' => 'no'));
    		}
    		elseif($action == 'active') {
    			$this->category_model->update_many($id_list, array('status' => 'yes'));
    		}
    		 
    		die('yes');
    	}
    }
    
    
    function change_order() {
    	$cate_id 	= 	$this->input->post('category_id');
    	$order 		= 	$this->input->post('category_order');
    	
    	$cate 		= 	$this->category_model->get_match($cate_id); //cate will be changed order position.
    	$cate_order = 	$this->category_model->get_match_order($order); // Check 'order' exists or not?
    	
    	if (count($cate_order) > 0) {
    		$this->category_model->update_order($cate_order['id'], array('order' => $cate->order));
    		$this->category_model->update_order($cate_id, array('order' => $order));
    			
    	} else {
    		$this->category_model->update_order($cate_id, array('order' => $order));
    	}
    	
    	redirect(admin_url('category'), 'refresh');
    }
    
    
    function search(){
		$keyword					=	$this->input->post('search');
    	#get info.
    	$search_list				= 	$this->category_model->get_search_list($keyword);
    	
    	#assign data.
    	$data['search_list']		=	$search_list;
    	$data['act']				=	"category";
    	$data['tpl_file']			=	"admin/search_index";
    	$this->load->view('admin/admin_layout/index', $data);	
    }
    
   
    
    
}

/*----------------------------------End---------------------------------------------*/