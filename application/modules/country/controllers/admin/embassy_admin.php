<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ---------------------------------------------------------------
 * Author  : Anthony Tran
 * Email   : Incredibletran@gmail.com - Incredibletran@hotmail.com
 * Version : 1.0
 * ---------------------------------------------------------------
*/
require_once(APPPATH.'controllers/admin_controller'.EXT);
class Embassy_admin extends Admin_controller {
	
	
	function __construct(){
        parent::__construct(); 
        $this->load->model(array('admin/embassy_model'));
        $this->load->library(array('session','upload'));
		$this->load->helper(array('link','upload','text'));
    }
    
    
    function index(){
    	#get number item on perpage.
    	if(isset($_REQUEST['perpage'])) {
    		$perpage		= 	$_REQUEST['perpage'];
    		$this->session->set_userdata('embassy_perpage',$perpage);
    	} else {
    		if($this->session->userdata('embassy_perpage')) {
    			$perpage	= 	$this->session->userdata('embassy_perpage');
    		} else {
    			$perpage 	= 	'12';
    			$this->session->set_userdata('embassy_perpage',$perpage);
    		}
    	}
    	#get total item in DB.
    	$total_embassy				= 	count($this->embassy_model->get_all());
    	$this->load->library('pagination');
    	$config['total_rows'] 		= 	$total_embassy;
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
    	$config['num_links']		= 	10;
    	$config['cur_tag_open']		= 	'<a class="currentpage">';
    	$config['cur_tag_close']	= 	'</a>';
    	$config['base_url']			= 	admin_url().'/embassy/';
    	$config['uri_segment']		= 	3;
    	$this->pagination->initialize($config);
    	 
    	$pagination					= 	$this->pagination->create_links();
    	$offset 					= 	($this->uri->segment(3)=='') ? 0 : $this->uri->segment(3);
    	 
    	#get info.
    	$embassy_list				= 	$this->embassy_model->get_embassy_list($perpage, $offset);
    	
    	$url_edit_embass			=	$this->selfURL();
    	$this->session->set_userdata('url_edit_embass', $url_edit_embass);
    	
    	$delete_embassy				=	$this->session->userdata('delete_embassy');
    	$this->session->unset_userdata('delete_embassy');
    	
    	if(isset($delete_embassy) && $delete_embassy == 'delete embassy'){
    		$inform	=	'delete embassy success';
    	}else {
    		$inform = "";
    	}
    	
    	
	    $data['current_url_status_embass']	=	$url_edit_embass;
	    $data['pagination']					=	$pagination;
	    $data['current_perpage']			=	$perpage;
    	$data['embassy_list']				=	$embassy_list;
    	$data['inform']						=	$inform;
    	$data['act']						=	"embassy";
    	$data['tpl_file']					=	"admin/embassy_index";
    	$this->load->view('admin/admin_layout/index', $data);
    }
    
    
    function add(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST'){
    		$this->form_validation->set_rules('city', 'City', 'trim|xss_clean');
    		$this->form_validation->set_rules('email', 'email', 'trim|xss_clean');
    		$this->form_validation->set_rules('address', 'Address', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('phone', 'Phone', 'trim|xss_clean');
    		$this->form_validation->set_rules('fax', 'Fax', 'trim|xss_clean');
    		$this->form_validation->set_rules('note', 'Note', 'trim|xss_clean');
    		
    		if($this->form_validation->run() == true){
    			$info = array(
    			    	        'city'   		=> $this->input->post('city'),
    			    			'address'   	=> $this->input->post('address'),
    			    			'active'	 	=> $this->input->post('status'),
    			    			'phone'			=> $this->input->post('phone'),
				    			'fax'			=> $this->input->post('fax'),
				    			'note'			=> $this->input->post('note'),
				    			'id_country'	=> $this->input->post('country'),
				    			'email'			=> $this->input->post('email')
    			);
    			 
    			if($this->embassy_model->check_exist($info['address'])) {
    				die('This address is exist!');
    			}else{
    				$this->embassy_model->add_embassy($info);
    				die('yes');
    			}
    		}else{
    			die(validation_errors());
    		}
    	}
    	#get info.
    	$country				=	$this->embassy_model->get_country();
    	
    	$data['country']		=	$country;
    	$data['embassy_info']	=	"";
    	$this->load->view('admin/embassy_add', $data);
    }
    
    
    
    function edit($embassy_id = ""){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$this->form_validation->set_rules('city', 'City', 'trim|xss_clean');
    		$this->form_validation->set_rules('email', 'email', 'trim|xss_clean');
    		$this->form_validation->set_rules('address', 'Address', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('phone', 'Phone', 'trim|xss_clean');
    		$this->form_validation->set_rules('fax', 'Fax', 'trim|xss_clean');
    		$this->form_validation->set_rules('note', 'Note', 'trim|xss_clean');
    		
    		if($this->form_validation->run() == true){
    			$nation			=	$this->input->post('country');
    			$nation_info	=	$this->embassy_model->get_match_country($nation);
    			$info = array(
    		    			    'city'   		=> $this->input->post('city'),
    			    			'address'   	=> $this->input->post('address'),
    			    			'active'	 	=> $this->input->post('status'),
    			    			'phone'			=> $this->input->post('phone'),
				    			'fax'			=> $this->input->post('fax'),
				    			'note'			=> $this->input->post('note'),
				    			'id_country'	=> $nation,
				    			'country_name'	=> $nation_info['name'],
				    			'email'			=> $this->input->post('email')
    						 );
    		
    			if($this->embassy_model->check_exist_edit($embassy_id, $info['address'])) {
    				die('This address is exist!');
    			}else{
    				$this->embassy_model->edit_embassy($embassy_id, $info);
    				die('yes');
    			}
    		}else{
    			die(validation_errors());
    		}
    		
    	}
    	
    	#get info from DB.
    	$embassy_info			=	$this->embassy_model->get_match($embassy_id);
    	$country				=	$this->embassy_model->get_country();


    	#assign data.
    	$data['current_url']	=	$this->session->userdata('url_edit_embass');
    	$data['country']		=	$country;
    	$data['embassy_info']	=	$embassy_info;
    	$data['embassy_id']		=	$embassy_id;
    	$this->load->view('admin/embassy_edit', $data);
    }
    
    
    
    function delete($embassy_id){

    	#delete cate in DB.
    	$this->embassy_model->delete($embassy_id);
     
	    $delete	=	"delete embassy";
	    $this->session->set_userdata('delete_embassy', $delete);
	    redirect(admin_url('embassy'),'refresh');
    }
    
    
    
    function change_status(){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$id     		= $this->input->post('id');
    		$status 		= $this->input->post('status');
    		 
    		$info			=	array();
    		$info['active']	=	$status;
    		 
    		$this->embassy_model->change_status($id, $info);
    		die('yes');
    	}
    }
    
    
    function load_row($id = ''){
    	$data['current_url']	=	$this->session->userdata('url_edit_embass');
    	$data['embassy'] 		= 	$this->embassy_model->get_match($id);
    	$this->load->view('admin/embassy_row', $data);
    }
    
    
    
    
    function do_action(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    		 
    		$id_list = $this->input->post('id');
    		$action  = $this->input->post('action');
    
    		if($action == 'delete') {
    			$this->embassy_model->delete_many($id_list);
    		}
    		elseif($action == 'suspend') {
    			$this->embassy_model->update_many($id_list, array('active' => 'no'));
    		}
    		elseif($action == 'active') {
    			$this->embassy_model->update_many($id_list, array('active' => 'yes'));
    		}
    		 
    		die('yes');
    	}
    }
    
    
	function search(){
		$keyword					=	$this->input->post('search');
    	#get info.
    	$search_list				= 	$this->embassy_model->get_search_list($keyword);
		$delete_embassy				=	$this->session->userdata('delete_embassy');
		$this->session->unset_userdata('delete_embassy');
		 
		if(isset($delete_embassy) && $delete_embassy == 'delete embassy'){
			$inform	=	'delete embassy success';
		}else {
			$inform = "";
		}
		
    	#assign data.
    	$data['inform']				=	$inform;
    	$data['current_url']		=	$this->session->userdata('url_edit_embass');
    	$data['keyword']			=	$keyword;
    	$data['search_list']		=	$search_list;
    	$data['act']				=	"embassy";
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

/*-------------------------------------------------End---------------------------------------------------*/