<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ---------------------------------------------------------------
 * Author  : Anthony Tran
 * Email   : Incredibletran@gmail.com - Incredibletran@hotmail.com
 * Version : 1.0
 * ---------------------------------------------------------------
*/
require_once(APPPATH.'controllers/admin_controller'.EXT);
class Adminstrators_admin extends Admin_controller {
	
	
	function __construct(){
        parent::__construct(); 
        $this->load->model(array('admin/adminstrators_model'));
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
    	$total_acc					= 	count($this->adminstrators_model->get_all_acc());
    	
    	$this->load->library('pagination');
		$config['total_rows'] 		= 	$total_acc;
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
		$config['base_url']			= 	admin_url().'/adminstrators-management/';
		$config['uri_segment']		= 	3;
		$this->pagination->initialize($config);
		
		$pagination					= 	$this->pagination->create_links();
    	$offset 					= 	($this->uri->segment(3)=='') ? 0 : $this->uri->segment(3);

    	#get info.
    	$current_url				=	$this->selfURL();
    	$this->session->set_userdata('url_adminstrator', $current_url);
    	
    	$accs_list					= 	$this->adminstrators_model->get_acc_list($perpage, $offset);
    	$edit_result				=	$this->session->userdata('edit_result');
    	$delete_result				=	$this->session->userdata('delete_result');
    	$this->session->unset_userdata('edit_result');
    	$this->session->unset_userdata('delete_result');
    	
    	if(isset($edit_result) && $edit_result == 'edit'){
    		$inform	=	'edit success';}
    	elseif (isset($delete_result) && $delete_result == 'delete') {
    		$inform = 'delete success';
    	}else { 
    		$inform = "";
    	} 
    	
    	#assign data.
    	$data['pagination']			=	$pagination;
    	$data['current_perpage']	=	$perpage;
    	$data['accs_list']			=	$accs_list;
    	$data['inform']				=	$inform;
    	$data['current_url']		=	$current_url;
    	$data['act']				=	"adminstrators";
    	$data['tpl_file']			=	"admin/index";
    	$this->load->view('admin/admin_layout/index', $data);
    }
    
    
    
	function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
			
        	$this->form_validation->set_rules('fullname', 'Full name', 'trim|xss_clean');
    		$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean|min_length[6]|max_length[12]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|xss_clean');

    		if($this->form_validation->run() == TRUE){
                $info = array(
                				'fullname'   => $this->input->post('fullname'),
			                    'username'   => $this->input->post('username'),
			                    'password'   => md5($this->input->post('password')),
			                    'email'      => $this->input->post('email'),
			                    'time'  	 => date('Y-m-d'),
			                    'group'		 => $this->input->post('add-group'),
			                    'active'	 => $this->input->post('status')
                			 );
                
                if($this->adminstrators_model->check_exist($info['username'])) {
                    die('This username not available !');
                }else {
                    $this->adminstrators_model->add_adminstrator($info);
                    die('yes');
                }
            }else {
                die(validation_errors());
            }
        }
        $data['hello']	=	"";
        $this->load->view('admin/add', $data);
    }
    
    
    function edit($id = ""){
    	
    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
			#set rules.
    		$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|min_length[6]|max_length[12]');    		                      
    		$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|xss_clean');
    		
    		if($this->form_validation->run() == TRUE) {
                $info	=	array();
                $info['fullname']	=	$_POST['fullname'];
                $info['username']	=	$_POST['username'];
                $info['group']		=	$_POST['change_group'];
                $info['email']		=	$_POST['email'];
                $info['active']		=	$_POST['change_status'];
                $info['time']		=	date('Y-m-d');
                if($_POST['password'] != ""){
                	$info['password']	=	md5($_POST['password']);
                }else {
                	$info['password']	=	"";
                }
                
                if($this->adminstrators_model->check_exist_edit($id, $info['username'])) {
                	die('This username is exist!');
                }else {
                	#update into DB.
                	$this->adminstrators_model->edit_adminstrator($id, $info);
                	die('yes');
                }
            }else {
            	die(validation_errors());
            }
        }
		#assign data.
		$data['current_url']	=	$this->session->userdata('url_adminstrator');
        $data['admin']       	= 	$this->adminstrators_model->get_match($id);
        $this->load->view('admin/edit', $data);
    }
    
    
    function delete($acc_id = ""){
    	#delete in DB.
    	$this->adminstrators_model->delete($acc_id);
    		
    	$delete	=	"delete";
    	$this->session->set_userdata('delete_result', $delete);
    	
    	$url	=	$this->session->userdata('url_adminstrator');
    	redirect($url,'refresh');
    }
    
    
	function change_status(){
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$id     = $this->input->post('acc_id');
			$status = $this->input->post('acc_status');
			
			$info	=	array();
			$info['active']	=	$status;
			
			$this->adminstrators_model->change_status($id, $info);
			die('yes');
		}
    }
    
    
    function load_row($id = ''){
    	
    	$data['admin'] = $this->adminstrators_model->get_match($id);
    	$this->load->view('admin/row', $data);
    }
    
    
    function do_action(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    			
    		$id_list = $this->input->post('id');
    		$action  = $this->input->post('action');

    		if($action == 'delete') {
    			$this->adminstrators_model->delete_many($id_list);
    		}
    		elseif($action == 'suspend') {
    			$this->adminstrators_model->update_many($id_list, array('active' => 'no'));
    		}
    		elseif($action == 'active') {
    			$this->adminstrators_model->update_many($id_list, array('active' => 'yes'));
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

/*-----------------------------------------End-------------------------------------------------*/