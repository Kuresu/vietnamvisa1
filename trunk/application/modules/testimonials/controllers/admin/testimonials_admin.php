<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ---------------------------------------------------------------
 * Author  : Anthony Tran
 * Email   : Incredibletran@gmail.com - Incredibletran@hotmail.com
 * Version : 1.0
 * ---------------------------------------------------------------
*/
require_once(APPPATH.'controllers/admin_controller'.EXT);
class Testimonials_admin extends Admin_controller {
	
	
	function __construct(){
        parent::__construct(); 
        $this->load->model(array('admin/testimonials_model'));
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
    	$total_quest				= 	count($this->testimonials_model->get_all());
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
    	$config['base_url']			= 	admin_url().'/testimonials/';
    	$config['uri_segment']		= 	3;
    	$this->pagination->initialize($config);
    	
    	$pagination					= 	$this->pagination->create_links();
    	$offset 					= 	($this->uri->segment(3)=='') ? 0 : $this->uri->segment(3);
    	
    	#get info.
    	$testimonials_list			= 	$this->testimonials_model->get_testimonials_list($perpage, $offset);
    	
    	$testimonials_url			=	$this->selfURL();
    	$this->session->set_userdata('testimonials_url', $testimonials_url);
	    $delete_testimonials		=	$this->session->userdata('delete_testimonials');
	    $this->session->unset_userdata('delete_testimonials');
	     
	    if(isset($delete_testimonials) && $delete_testimonials == 'delete testimonials'){
	    	$inform	=	'delete testimonials success';
	    }else {
	    	$inform = "";
	    }
    	
	    #assign data.
	    $data['current_url']			=	$testimonials_url;
	    $data['pagination']				=	$pagination;
	    $data['current_perpage']		=	$perpage;
    	$data['testimonials_list']		=	$testimonials_list;
    	$data['inform']					=	$inform;
    	$data['act']					=	"testimonials";
    	$data['tpl_file']				=	"admin/index";
    	$this->load->view('admin/admin_layout/index', $data);
    }
    

    
    function edit($testimonials_id = ""){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$this->form_validation->set_rules('brief', 'Testimonials Brief', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('content', 'Content', 'required|trim|xss_clean');
    		
    		if($this->form_validation->run() == true){
    			$info	= 	array(
    		    			    	'title'   		=> $this->input->post('brief'),
    		    			    	'content'   	=> $this->input->post('content'),
    		    					'active'		=> $this->input->post('status')
    						 	 );
    			

    			#update testimonials.
    			$this->testimonials_model->edit_testimonials($testimonials_id, $info);
    			die('yes');
    		}else{
    			die(validation_errors());
    		}
    	}
    	
    	#get info from DB.
    	$testimonials_info			=	$this->testimonials_model->get_match($testimonials_id);
		
    	$data['current_url']		=	$this->session->userdata('testimonials_url');
    	$data['testimonials_info']	=	$testimonials_info;
    	$this->load->view('admin/edit', $data);
    }
    
    
    
    function delete($quest_id){
    	#delete in DB.
    	$this->testimonials_model->delete($quest_id);
    
    	#delete answer.
    	$this->testimonials_model->delete_answer($quest_id);
     
	    $delete	=	"delete testimonials";
	    $this->session->set_userdata('delete_testimonials', $delete);
	    
	    $url	=	$this->session->userdata('testimonials_url');
	    redirect($url, 'refresh');
    }
    
    
    
    function change_status(){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$id     		= $this->input->post('id');
    		$status 		= $this->input->post('status');
    		 
    		$info			=	array();
    		$info['active']	=	$status;
    		 
    		$this->testimonials_model->change_status($id, $info);
    		die('yes');
    	}
    }
    
    
    function load_row($id = ''){
    	$data['testimonials'] 		= 	$this->testimonials_model->get_match($id);
    	$this->load->view('admin/row', $data);
    }
    
    
    
    function do_action(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    		 
    		$id_list = $this->input->post('id');
    		$action  = $this->input->post('action');
    
    		if($action == 'delete') {
    			$this->testimonials_model->delete_many($id_list);
    		}
    		elseif($action == 'suspend') {
    			$this->testimonials_model->update_many($id_list, array('active' => 'no'));
    		}
    		elseif($action == 'active') {
    			$this->testimonials_model->update_many($id_list, array('active' => 'yes'));
    		}
    		 
    		die('yes');
    	}
    }
    
    
    
    function search(){
    	$keyword					=	$this->input->post('search');
    	#get info.
    	$search_list				= 	$this->testimonials_model->get_search_list($keyword);
    
   	 	$delete_testimonials		=	$this->session->userdata('delete_testimonials');
	    $this->session->unset_userdata('delete_testimonials');
	     
	    if(isset($delete_testimonials) && $delete_testimonials == 'delete testimonials'){
	    	$inform	=	'delete testimonials success';
	    }else {
	    	$inform = "";
	    }
    	 
    	#assign data.
    	$data['inform']				=	$inform;
    	$data['keyword']			=	$keyword;
    	$data['current_url']		=	$this->session->userdata('testimonials_url');
        $data['search_list']		=	$search_list;
    	$data['act']				=	"testimonials";
    	
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

/*--------------------------------------------End--------------------------------------------*/