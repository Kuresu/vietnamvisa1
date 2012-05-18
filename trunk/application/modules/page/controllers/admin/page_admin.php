<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ---------------------------------------------------------------
 * Author  : Anthony Tran
 * Email   : Incredibletran@gmail.com - Incredibletran@hotmail.com
 * Version : 1.0
 * ---------------------------------------------------------------
*/
require_once(APPPATH.'controllers/admin_controller'.EXT);
class Page_admin extends Admin_controller {
	
	
	function __construct(){
        parent::__construct(); 
        $this->load->model(array('admin/page_model'));
        $this->load->library(array('session','upload'));
		$this->load->helper(array('link'));
    }
    
    
    function index(){
    	#get number item on perpage.
    	if(isset($_REQUEST['perpage'])) {
    		$perpage		= 	$_REQUEST['perpage'];
    		$this->session->set_userdata('page_perpage',$perpage);
    	} else {
    		if($this->session->userdata('page_perpage')) {
    			$perpage	= 	$this->session->userdata('page_perpage');
    		} else {
    			$perpage 	= 	'all';
    			$this->session->set_userdata('page_perpage',$perpage);
    		}
    	}
    	 
    	#get total item in DB.
    	$total_page					= 	count($this->page_model->get_all_page());
    	$this->load->library('pagination');
    	$config['total_rows'] 		= 	$total_page;
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
    	$config['base_url']			= 	admin_url().'/page/';
    	$config['uri_segment']		= 	3;
    	$this->pagination->initialize($config);
    	 
    	$pagination					= 	$this->pagination->create_links();
    	$offset 					= 	($this->uri->segment(3)=='') ? 0 : $this->uri->segment(3);
    	 
    	#get info.
    	$current_url				=	$this->selfURL();
    	$this->session->set_userdata('current_url_page', $current_url);
    	$cate_info					=	$this->page_model->get_tree_cate();
    	$page_list					= 	$this->page_model->get_page_list($perpage, $offset);
    	$delete_page				=	$this->session->userdata('delete_page');
    	$this->session->unset_userdata('delete_page');
    	
    	if(isset($delete_page) && $delete_page == 'delete page'){
    		$inform	=	'delete page success';
    	}else {
    		$inform = "";
    	}
    	
    	#assign data.
    	$data['url_page_status']	=	$current_url;
    	$data['cate_info']			=	$cate_info;
    	$data['page_list']			=	$page_list;
    	$data['pagination']			=	$pagination;
    	$data['current_perpage']	=	$perpage;
    	$data['inform']				=	$inform;
    	$data['act']				=	"page";
    	$data['tpl_file']			=	"admin/index";
    	$this->load->view('admin/admin_layout/index', $data);
    }
    
    
    function add(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    		 
    		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('title', 'Title', 'trim|xss_clean');
    		$this->form_validation->set_rules('keyword', 'Keyword', 'trim|xss_clean');
    		$this->form_validation->set_rules('description', 'Description', 'trim|xss_clean');
    		$this->form_validation->set_rules('content', 'Content', 'required|trim|xss_clean');
    		 
    		if($this->form_validation->run() == TRUE){
    			$url		=	'page/'.ascii_link($this->input->post('name'));
    			$cate_id	=	$this->input->post('category');
    			if($cate_id){$cate_temp = '|'.implode('|',$cate_id).'|';}else{$cate_temp = "";}
    			$cate_name	=	$this->get_cate_match($cate_id);
    			
    			if($cate_name){
    				#get serie of category name.
    				$cate_imp	=	array();
    				foreach ($cate_name as $k => $v){
    					$cate_imp[]	=	$v->name;
    				}
    				$cate_imp_temp	=	'|'.implode('|',$cate_imp).'|';	
    			}else{
    				$cate_imp_temp	=	"";
    			}
    			
    			
    			$info = array(
        	                				'name'   		=> $this->input->post('name'),
        				                    'name_ascii'   	=> ascii_link($this->input->post('name')),
        				                    'title'			=> $this->input->post('title'),
        				                    'keyword'		=> $this->input->post('keyword'),
        				                    'description'	=> $this->input->post('description'),
        				                    'content'		=> $this->input->post('content'),
        				                    'active'	 	=> $this->input->post('status'),
        				                    'cate_id'		=> $cate_temp,
    										'cate_name'		=> $cate_imp_temp,
        				                    'url'			=> $url,
        				                    'order'			=> $this->input->post('order'),
        				                    'hit'			=> $this->input->post('hit')
    						 );
    			
    			if($this->page_model->check_exist($info['name'])) {
    				die('This name is exist!');
    			}elseif ($this->page_model->check_order_exist($info['order'])){
    				die('This order is exist !');
    			}else{
    				$this->page_model->add_page($info);
    				die('yes');
    			}
    		}else {
    			die(validation_errors());
    		}
    	}
    	#get info.
    	$cate_info			=	$this->page_model->get_tree_cate();
    	
    	$data['cate_info']	=	$cate_info;
    	$data['total']		=	count($this->page_model->get_all_page());
    	$this->load->view('admin/add', $data);
    }
    
    
    function edit($page_id	=	''){
    	if($_SERVER['REQUEST_METHOD'] == 'POST'){
    		#set rules
    		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('title', 'Title', 'trim|xss_clean');
    		$this->form_validation->set_rules('keyword', 'Keyword', 'trim|xss_clean');
    		$this->form_validation->set_rules('description', 'Description', 'trim|xss_clean');
    		$this->form_validation->set_rules('content', 'Content', 'required|trim|xss_clean');
    
    		if($this->form_validation->run() == TRUE){
    			$url		=	'page/'.ascii_link($this->input->post('name'));
    			$cate_id	=	$this->input->post('category');
    			if($cate_id){
    				$cate_temp = '|'.implode('|',$cate_id).'|';
    			}else{
    				$cate_temp = "";
    			}
    			$cate_name	=	$this->get_cate_match($cate_id);
    			 
    			if($cate_name){
    				#get serie of category name.
    				$cate_imp	=	array();
	    			foreach ($cate_name as $k => $v){
	    				$cate_imp[]	=	$v->name;
	    			}
	    			$cate_imp_temp	=	'|'.implode('|',$cate_imp).'|';
    			}else{
    				$cate_imp_temp	=	"";
    			}
    			$info = array(
        	                				'name'   		=> $this->input->post('name'),
        				                    'name_ascii'   	=> ascii_link($this->input->post('name')),
        				                    'title'			=> $this->input->post('title'),
        				                    'keyword'		=> $this->input->post('keyword'),
        				                    'description'	=> $this->input->post('description'),
        				                    'content'		=> $this->input->post('content'),
        				                    'active'	 	=> $this->input->post('status'),
        				                    'cate_id'		=> $cate_temp,
    										'cate_name'		=> $cate_imp_temp,
        				                    'url'			=> $url,
        				                    'order'			=> $this->input->post('order'),
        				                    'hit'			=> $this->input->post('hit')
    						 );
    
    			if($this->page_model->check_exist_edit($page_id, $info['name'])) {
    				die('This name is exist!');
    			}elseif ($this->page_model->check_order_exist_edit($page_id, $info['order'])){
    				die('This order is exist !');
    			}else{
    				$this->page_model->edit_page($page_id, $info);
    				die('yes');
    			}
    		}else {
    			die(validation_errors());
    		}
    	}
    	#get info from DB.
    	$cate_info				=	$this->page_model->get_tree_cate();
    	$page_info				=	$this->page_model->get_match($page_id);
    	$cate_id				=	explode('|',$page_info->cate_id);
    	
    	$data['edit_url_page']	=	$this->session->userdata('current_url_page');
    	$data['cate_info']		=	$cate_info;
    	$data['page_info']		=	$page_info;
    	$data['cate_id']		=	$cate_id;
    	$data['page_id']		=	$page_id;
    	$data['hello']			=	"";
    	$this->load->view('admin/edit', $data);
    }
    
    
    function change_status(){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$id     		= $this->input->post('id');
    		$status 		= $this->input->post('status');
    		 
    		$info			=	array();
    		$info['active']	=	$status;
    		 
    		$this->page_model->change_status($id, $info);
    		die('yes');
    	}
    }
    
    
    function load_row($id = ''){
    	$data['current_url']	=	$this->session->userdata('current_url_page');
    	$data['page'] 			= $this->page_model->get_match($id);
    	$this->load->view('admin/row', $data);
    }
    
    
    function do_action(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    		 
    		$id_list = $this->input->post('id');
    		$action  = $this->input->post('action');
    
    		if($action == 'delete') {
    			$this->page_model->delete_many($id_list);
    		}
    		elseif($action == 'suspend') {
    			$this->page_model->update_many($id_list, array('active' => 'no'));
    		}
    		elseif($action == 'active') {
    			$this->page_model->update_many($id_list, array('active' => 'yes'));
    		}
    		 
    		die('yes');
    	}
    }
    
    
    function delete($page_id){
    	#delete in DB.
    	$this->page_model->delete($page_id);
     
	    $delete	=	"delete page";
	    $this->session->set_userdata('delete_page', $delete);
	    $url	=	$this->session->userdata('current_url_page');
    	redirect($url, 'refresh');
    }
    
    
    function change_order() {
    	$page_id 		= 	$this->input->post('page_id');
    	$page_order 	= 	$this->input->post('page_order');
    	 
    	$page 			= 	$this->page_model->get_match($page_id); //cate will be changed order position.
    	$order		 	= 	$this->page_model->get_match_order($page_order); // Check 'order' exists or not?
    	 
    	if (count($order) > 0) {
    		$this->page_model->update_order($order['id'], array('order' => $page->order));
    		$this->page_model->update_order($page_id, array('order' => $page_order));
    		 
    	} else {
    		$this->page_model->update_order($page_id, array('order' => $page_order));
    	}

    	$url	=	$this->session->userdata('current_url_page');
    	redirect($url, 'refresh');
    }
    
    
    function search(){
    	$keyword					=	$this->input->post('search');
    	$cate_id					=	'|'.$this->input->post('category').'|';
    	#get info.
    	$search_list				= 	$this->page_model->get_search_list($keyword, $cate_id);
    	$cate_info					=	$this->page_model->get_tree_cate();
    	
    	$delete_page				=	$this->session->userdata('delete_page');
    	$this->session->unset_userdata('delete_page');
    	 
    	if(isset($delete_page) && $delete_page == 'delete page'){
    		$inform	=	'delete page success';
    	}else {
    		$inform = "";
    	}
    	
    	#assign data.
    	$data['current_url']		=	$this->session->userdata('current_url_page');
    	$data['inform']				=	$inform;
    	$data['keyword']			=	$keyword;
    	$data['cate_info']			=	$cate_info;
    	$data['cate_id']			=	$this->input->post('category');
    	$data['search_list']		=	$search_list;
    	$data['act']				=	"page";
		$data['tpl_file']			=	"admin/search_index";
		$this->load->view('admin/admin_layout/index', $data);	
    }
    
    
    
    function get_cate_match($cate_id = array()){
    	$cate_match = $this->page_model->get_cate_match($cate_id);
    	return $cate_match;
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

/*-------------------------------------------------End-----------------------------------------------------*/