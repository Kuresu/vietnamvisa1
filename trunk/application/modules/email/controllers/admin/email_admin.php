<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ---------------------------------------------------------------
 * Author  : Anthony Tran
 * Email   : Incredibletran@gmail.com - Incredibletran@hotmail.com
 * Version : 1.0
 * ---------------------------------------------------------------
*/
require_once(APPPATH.'controllers/admin_controller'.EXT);
class Email_admin extends Admin_controller {
	
	
	function __construct(){
        parent::__construct(); 
        $this->load->model(array('admin/email_model'));
        $this->load->library(array('session','upload'));
		$this->load->helper(array('link','upload','text'));
    }
    
    
    function index(){
    	
    	#get number item on perpage.
    	if(isset($_REQUEST['perpage'])) {
    		$perpage		= 	$_REQUEST['perpage'];
    		$this->session->set_userdata('quest_perpage',$perpage);
    	} else {
    		if($this->session->userdata('quest_perpage')) {
    			$perpage	= 	$this->session->userdata('quest_perpage');
    		} else {
    			$perpage 	= 	'all';
    			$this->session->set_userdata('quest_perpage',$perpage);
    		}
    	}
    	
    	#get total item in DB.
    	$total_quest				= 	$this->email_model->count_all();
    	$this->load->library('pagination');
    	$config['total_rows'] 		= 	$total_quest;
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
    	$config['base_url']			= 	admin_url().'/email/';
    	$config['uri_segment']		= 	3;
    	$this->pagination->initialize($config);
    	
    	$pagination					= 	$this->pagination->create_links();
    	$offset 					= 	($this->uri->segment(3)=='') ? 0 : $this->uri->segment(3);
    	
    	#get info.
    	$email_list					= 	$this->email_model->get_list($perpage, $offset);

    	
    	$email_url					=	$this->selfURL();
    	$this->session->set_userdata('email_url', $email_url);
	    $delete_email				=	$this->session->userdata('delete_email');
	    $this->session->unset_userdata('delete_email');
	     
	    if(isset($delete_email) && $delete_email == 'delete email'){
	    	$inform	=	'delete email success';
	    }else {
	    	$inform = "";
	    }
    	
	    #assign data.
	    $data['current_url']			=	$email_url;
	    $data['pagination']				=	$pagination;
	    $data['current_perpage']		=	$perpage;
    	$data['email_list']				=	$email_list;
    	$data['inform']					=	$inform;
    	$data['act']					=	"email";
    	$data['tpl_file']				=	"admin/index";
    	$this->load->view('admin/admin_layout/index', $data);
    }
    
    
    
    
    function add(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    		 
    		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('subject', 'Subject', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('content', 'Content', 'required|trim|xss_clean');
    		 
    		if($this->form_validation->run() == TRUE){
    			$info = array(
    	        	             'name'   		=> $this->input->post('name'),
    	        				 'subject'   	=> $this->input->post('subject'),
    	        				 'content'		=> $this->input->post('content'),
    	        				 'active'	 	=> $this->input->post('status')
    						 );
    			 
    			if($this->email_model->check_exist($info['name'])) {
    				die('This name is exist!');
    			}elseif ($this->email_model->check_subject_exist($info['subject'])){
    				die('This subject is exist !');
    			}else{
    				$this->email_model->add($info);
    				die('yes');
    			}
    		}else {
    			die(validation_errors());
    		}
    	}
    	
    	$this->load->view('admin/add');
    }
    
    
    
    function edit($id = ""){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('subject', 'Subject', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('content', 'Content', 'required|trim|xss_clean');
    		
    		if($this->form_validation->run() == true){
    			$info = array(
    			    	        'name'   		=> $this->input->post('name'),
    			    	        'subject'   	=> $this->input->post('subject'),
    			    	        'content'		=> $this->input->post('content'),
    			    	        'active'	 	=> $this->input->post('status')
    						 );
    			
    			if($this->email_model->check_edit_exist($id, $info['name'])) {
    				die('This name is exist!');
    			}elseif ($this->email_model->check_subject_edit_exist($id, $info['subject'])){
    				die('This subject is exist !');
    			}else{
    				$this->email_model->edit($id, $info);
    				die('yes');
    			}
    		}else{
    			die(validation_errors());
    		}
    	}
    	
    	#get info from DB.
    	$email_info				=	$this->email_model->get_match($id);
    	
    	$data['current_url']	=	$this->session->userdata('email_url');
    	$data['email_info']		=	$email_info;
    	$this->load->view('admin/edit', $data);
    }
    
    
    
    function delete($id){
    	#delete in DB.
    	$this->email_model->delete($id);
     
	    $delete	=	"delete email";
	    $this->session->set_userdata('delete_email', $delete);
	    
	    $url	=	$this->session->userdata('email_url');
	    redirect($url, 'refresh');
    }
    
    
    
    function change_status(){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$id     		= $this->input->post('id');
    		$status 		= $this->input->post('status');
    		 
    		$info			=	array();
    		$info['active']	=	$status;
    		 
    		$this->email_model->change_status($id, $info);
    		die('yes');
    	}
    }
    
    
    function load_row($id = ''){
    	
    	$data['email'] 		= 	$this->email_model->get_match($id);
    	$this->load->view('admin/row', $data);
    }
    
    
    
    function do_action(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    		 
    		$id_list = $this->input->post('id');
    		$action  = $this->input->post('action');
    
    		if($action == 'delete') {
    			$this->email_model->delete_many($id_list);
    		}
    		elseif($action == 'suspend') {
    			$this->email_model->update_many($id_list, array('active' => 'no'));
    		}
    		elseif($action == 'active') {
    			$this->email_model->update_many($id_list, array('active' => 'yes'));
    		}
    		 
    		die('yes');
    	}
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

/*--------------------------------------------End--------------------------------------------*/