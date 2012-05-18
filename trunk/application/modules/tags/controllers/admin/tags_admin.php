<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ---------------------------------------------------------------
 * Author  : Anthony Tran
 * Email   : Incredibletran@gmail.com - Incredibletran@hotmail.com
 * Version : 1.0
 * ---------------------------------------------------------------
*/
require_once(APPPATH.'controllers/admin_controller'.EXT);
class Tags_admin extends Admin_controller {
	
	
	function __construct(){
        parent::__construct(); 
        $this->load->model(array('admin/tags_model'));
        $this->load->library(array('session','upload'));
		$this->load->helper(array('link'));
    }
    
    
    function index(){
    	#get number item on perpage.
    	if(isset($_REQUEST['perpage'])) {
    		$perpage		= 	$_REQUEST['perpage'];
    		$this->session->set_userdata('tags_perpage',$perpage);
    	} else {
    		if($this->session->userdata('tags_perpage')) {
    			$perpage	= 	$this->session->userdata('tags_perpage');
    		} else {
    			$perpage 	= 	'all';
    			$this->session->set_userdata('tags_perpage',$perpage);
    		}
    	}
    	 
    	#get total item in DB.
    	$total_tags					= 	count($this->tags_model->get_all());
    	$this->load->library('pagination');
    	$config['total_rows'] 		= 	$total_tags;
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
    	$config['num_links']		= 	3;
    	$config['cur_tag_open']		= 	'<a class="currentpage">';
    	$config['cur_tag_close']	= 	'</a>';
    	$config['base_url']			= 	admin_url().'/tags/';
    	$config['uri_segment']		= 	3;
    	$this->pagination->initialize($config);
    	 
    	$pagination					= 	$this->pagination->create_links();
    	$offset 					= 	($this->uri->segment(3)=='') ? 0 : $this->uri->segment(3);
    	 
    	#get info.
    	$tag_url					=	$this->selfURL();
    	$this->session->set_userdata('tag_url', $tag_url);
    	$tags_list					= 	$this->tags_model->get_tag_list($perpage, $offset);
    	$delete_tag					=	$this->session->userdata('delete_tag');
    	$this->session->unset_userdata('delete_tag');
    	
    	if(isset($delete_tag) && $delete_tag == 'delete tag'){
    		$inform	=	'delete tag success';
    	}else {
    		$inform = "";
    	}
    	
    	#assign data.
    	$data['current_url']		=	$tag_url;
    	$data['tags_list']			=	$tags_list;
    	$data['pagination']			=	$pagination;
    	$data['current_perpage']	=	$perpage;
    	$data['inform']				=	$inform;
    	$data['act']				=	"tags";
    	$data['tpl_file']			=	"admin/index";
    	$this->load->view('admin/admin_layout/index', $data);
    }
    
    
    function add(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    		 
    		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('title', 'Title', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('keywords', 'Keyword', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('description', 'Description', 'required|trim|xss_clean');
    		 
    		if($this->form_validation->run() == TRUE){
    			$info = array(
        	                				'page'   		=> $this->input->post('name'),
        				                    'page_ascii'   	=> ascii_link($this->input->post('name')),
        				                    'title'			=> $this->input->post('title'),
        				                    'keywords'		=> $this->input->post('keywords'),
        				                    'description'	=> $this->input->post('description'),
    						 );
    			
    			if($this->tags_model->check_exist($info['page'])) {
    				die('This name is exist!');
    			}else{
    				$this->tags_model->add_tag($info);
    				die('yes');
    			}
    		}else {
    			die(validation_errors());
    		}
    	}
    
    	$data['hello']	=	"";
    	$this->load->view('admin/add', $data);
    }
    
    
    function edit($tag_id	=	''){
    	if($_SERVER['REQUEST_METHOD'] == 'POST'){
    		#set rules
    		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('title', 'Title', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('keywords', 'Keyword', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('description', 'Description', 'required|trim|xss_clean');
    
    		if($this->form_validation->run() == TRUE){
    			$info = array(
        	                				'page'   		=> $this->input->post('name'),
        				                    'page_ascii'   	=> ascii_link($this->input->post('name')),
        				                    'title'			=> $this->input->post('title'),
        				                    'keywords'		=> $this->input->post('keywords'),
        				                    'description'	=> $this->input->post('description'),
    						 );
    
    			if($this->tags_model->check_exist_edit($tag_id, $info['page'])) {
    				die('This name is exist!');
    			}else{
    				$this->tags_model->edit_tag($tag_id, $info);
    				die('yes');
    			}
    		}else {
    			die(validation_errors());
    		}
    	}
    	#get info from DB.
    	$tag_info				=	$this->tags_model->get_match($tag_id);
    	
    	$data['current_url']	=	$this->session->userdata('tag_url');
    	$data['tag_info']		=	$tag_info;
    	$this->load->view('admin/edit', $data);
    }
    
    
    function change_status(){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$id     		= $this->input->post('id');
    		$status 		= $this->input->post('status');
    		 
    		$info			=	array();
    		$info['active']	=	$status;
    		 
    		$this->tags_model->change_status($id, $info);
    		die('yes');
    	}
    }
    
    
    function load_row($id = ''){
    
    	$data['page'] = $this->tags_model->get_match($id);
    	$this->load->view('admin/row', $data);
    }
    
    
    function do_action(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    		 
    		$id_list = $this->input->post('id');
    		$action  = $this->input->post('action');
    
    		if($action == 'delete') {
    			$this->tags_model->delete_many($id_list);
    		}
    		
    		die('yes');
    	}
    }
    
    
    function delete($tag_id){
    	#delete in DB.
    	$this->tags_model->delete($tag_id);
     
	    $delete	=	"delete tag";
	    $this->session->set_userdata('delete_tag', $delete);
	    $url	=	$this->session->userdata('tag_url');
	    redirect($url,'refresh');
    }
    
    
    
    
    function search(){
    	#get info.
    	$keyword					=	$this->input->post('search');
    	$search_list				= 	$this->tags_model->get_search_list($keyword);
    	$delete_tag					=	$this->session->userdata('delete_page');
    	$this->session->unset_userdata('delete_tag');
    	 
    	if(isset($delete_tag) && $delete_tag == 'delete tag'){
    		$inform	=	'delete tag success';
    	}else {
    		$inform = "";
    	}
    	
    	#assign data.
    	$data['inform']				=	$inform;
    	$data['keyword']			=	$keyword;
    	$data['search_list']		=	$search_list;
    	$data['act']				=	"tags";
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

/*---------------------------------------------End----------------------------------------------*/