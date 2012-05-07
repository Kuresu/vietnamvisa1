<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
    	$edit_cate					=	$this->session->userdata('edit_cate');
    	$this->session->unset_userdata('edit_cate');
    	 
    	if(isset($edit_cate) && $edit_cate == 'edit'){
    		$inform	=	'edit cate success';
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
    	$data['total']		=	count($this->category_model->get_all_cate());	
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
//End Page_admin