<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ---------------------------------------------------------------
 * Author  : Anthony Tran
 * Email   : Incredibletran@gmail.com - Incredibletran@hotmail.com
 * Version : 1.0
 * ---------------------------------------------------------------
*/
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
    	$menu_url					=	$this->selfURL();
    	$this->session->set_userdata('menu_url', $menu_url);
    	$delete_menu				=	$this->session->userdata('delete_menu');
    	$this->session->unset_userdata('delete_menu');
    	 
    	if(isset($delete_menu) && $delete_menu == 'delete'){
    		$inform	=	'delete menu success';
    	}else {
    		$inform = "";
    	}
    	
    	#assign data.
    	$data['current_url']			=	$menu_url;
    	$data['current_filter_parent']	= 	$this->session->userdata('filter_menu_parent');
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
    	
    	$data['current_url']	=	$this->session->userdata('menu_url');
    	$data['tree_cate']		=	$this->menu_model->get_tree_edit($menu_id);
    	$data['menu_info']		=	$this->menu_model->get_match($menu_id);
    	$data['hello']			=	"";
    	$this->load->view('admin/edit', $data);
    }
    
    
    function delete($menu_id){
    	
    	#delete in DB.
    	$this->menu_model->delete($menu_id);
    	$delete	=	"delete";
    	$this->session->set_userdata('delete_menu', $delete);
    	
    	$url	=	$this->session->userdata('menu_url');
    	redirect($url, 'refresh');
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
    	
    	$url	=	$this->session->userdata('menu_url');
    	redirect($url, 'refresh');
    }
    
    
    function search(){
		$keyword					=	$this->input->post('search');
    	#get info.
    	$search_list				= 	$this->menu_model->get_search_list($keyword);
    	
    	#assign data.
    	$data['current_url']		=	$this->session->userdata('menu_url');
    	$data['search_list']		=	$search_list;
    	$data['act']				=	"category";
    	$data['tpl_file']			=	"admin/search_index";
    	$this->load->view('admin/admin_layout/index', $data);	
    }
    
   
    
    function selfURL(){
    	if(!isset($_SERVER['REQUEST_URI'])){
    		$serverrequri = $_SERVER['PHP_SELF'];
    	}else{
    		$serverrequri =    $_SERVER['REQUEST_URI'];
    	}
    	$protocol 	= strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === FALSE ? 'http' : 'https';
    	$host     	= $_SERVER['HTTP_HOST'];
    	$port 		= ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
    
    
    	$currentUrl = $protocol . '://' . $host . $port .$_SERVER['REQUEST_URI'];
    
    	return $currentUrl;
    }
    
    
}

/*---------------------------------------------End-------------------------------------------------*/