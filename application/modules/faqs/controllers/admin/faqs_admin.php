<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ---------------------------------------------------------------
 * Author  : Anthony Tran
 * Email   : Incredibletran@gmail.com - Incredibletran@hotmail.com
 * Version : 1.0
 * ---------------------------------------------------------------
*/
require_once(APPPATH.'controllers/admin_controller'.EXT);
class Faqs_admin extends Admin_controller {
	
	
	function __construct(){
        parent::__construct(); 
        $this->load->model(array('admin/faqs_model'));
        $this->load->library(array('session','upload'));
		$this->load->helper(array('link','upload','text'));
    }
    
    
    function index(){
    	#get number item on perpage.
    	if(isset($_REQUEST['perpage'])) {
    		$perpage		= 	$_REQUEST['perpage'];
    		$this->session->set_userdata('faqs_perpage',$perpage);
    	} else {
    		if($this->session->userdata('faqs_perpage')) {
    			$perpage	= 	$this->session->userdata('faqs_perpage');
    		} else {
    			$perpage 	= 	'all';
    			$this->session->set_userdata('faqs_perpage',$perpage);
    		}
    	}
    	
    	#get total item in DB.
    	$total_faqs					= 	count($this->faqs_model->get_all());
    	$this->load->library('pagination');
    	$config['total_rows'] 		= 	$total_faqs;
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
    	$config['base_url']			= 	admin_url().'/faqs/';
    	$config['uri_segment']		= 	3;
    	$this->pagination->initialize($config);
    	
    	$pagination					= 	$this->pagination->create_links();
    	$offset 					= 	($this->uri->segment(3)=='') ? 0 : $this->uri->segment(3);
    	
    	#get info.
    	$faqs_list					= 	$this->faqs_model->get_faqs_list($perpage, $offset);
    	$fcate_info					=	$this->faqs_model->get_fcate();
    
	    $delete_faq					=	$this->session->userdata('delete_faq');
	    $this->session->unset_userdata('delete_faq');
	     
	    if(isset($delete_faq) && $delete_faq == 'delete faq'){
	    	$inform	=	'delete faq success';
	    }else {
	    	$inform = "";
	    }
    	
	    $data['fcate_info']			=	$fcate_info;
	    $data['pagination']			=	$pagination;
	    $data['current_perpage']	=	$perpage;
    	$data['faqs_list']			=	$faqs_list;
    	$data['inform']				=	$inform;
    	$data['act']				=	"faqs";
    	$data['tpl_file']			=	"admin/index";
    	$this->load->view('admin/admin_layout/index', $data);
    }
    
    
    function add(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST'){
    		$this->form_validation->set_rules('question', 'Question', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('answer', 'Answer', 'required|trim|xss_clean');
    		
    		if($this->form_validation->run() == true){
    			$cate_id	=	$this->input->post('category');		
    			$cate_info	=	$this->faqs_model->get_match_fcate($cate_id);
    			$info = array(
    			    			 'question'   		=> $this->input->post('question'),
    			    			 'question_ascii'   => ascii_link($this->input->post('question')),
    							 'answers'   		=> $this->input->post('answer'),
    			    			 'active'	 		=> $this->input->post('status'),
    			    			 'order'			=> $this->input->post('order'),
    			    			 'cate_id'			=> $cate_id, 
    							 'cate_name'		=> $cate_info->name,
    						 );
    			
    			if($this->faqs_model->check_exist(ascii_link($info['question']))) {
    				die('This question is exist!');
    			}elseif ($this->faqs_model->check_order_exist($info['order'])){
    				die('This order is exist !');
    			}else{
    				$this->faqs_model->add_faq($info);
    				die('yes');
    			}
    		}else{
    			die(validation_errors());
    		}
    	}
    	#get data.
    	$fcate_info					=	$this->faqs_model->get_fcate();
    	
    	$data['cate_info']			=	$fcate_info;
    	$this->load->view('admin/add', $data);
    }
    
    
    
    function edit($faq_id = ""){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$this->form_validation->set_rules('question', 'Question', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('answer', 'Answer', 'required|trim|xss_clean');
    		
    		if($this->form_validation->run() == true){
    			$cate_id	=	$this->input->post('category');
    			$cate_info	=	$this->faqs_model->get_match_fcate($cate_id);
    			$info = array(
    		    			    			 'question'   		=> $this->input->post('question'),
    		    			    			 'question_ascii'   => ascii_link($this->input->post('question')),
    		    							 'answers'   		=> $this->input->post('answer'),
    		    			    			 'active'	 		=> $this->input->post('status'),
    		    			    			 'order'			=> $this->input->post('order'),
    		    			    			 'cate_id'			=> $cate_id, 
    		    							 'cate_name'		=> $cate_info->name,
    			);
    			 
    			if($this->faqs_model->check_exist_edit($faq_id, ascii_link($info['question']))) {
    				die('This question is exist!');
    			}elseif ($this->faqs_model->check_order_exist_edit($faq_id, $info['order'])){
    				die('This order is exist !');
    			}else{
    				$this->faqs_model->edit_faq($faq_id, $info);
    				die('yes');
    			}
    		}else{
    			die(validation_errors());
    		}
    	}
    	
    	#get info from DB.
    	$faq_info			=	$this->faqs_model->get_match($faq_id);
    	$fcate_info			=	$this->faqs_model->get_fcate();

    	$data['cate_info']	=	$fcate_info;
    	$data['faq_info']	=	$faq_info;
    	$data['faq_id']		=	$faq_id;
    	$this->load->view('admin/edit', $data);
    }
    
    
    
    function delete($faq_id){
    	#delete in DB.
    	$this->faqs_model->delete($faq_id);
     
	    $delete	=	"delete faq";
	    $this->session->set_userdata('delete_faq', $delete);
	    redirect(admin_url('faqs'),'refresh');
    }
    
    
    
    function change_status(){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$id     		= $this->input->post('id');
    		$status 		= $this->input->post('status');
    		 
    		$info			=	array();
    		$info['active']	=	$status;
    		 
    		$this->faqs_model->change_status($id, $info);
    		die('yes');
    	}
    }
    
    
    function load_row($id = ''){
    
    	$data['faq'] = $this->faqs_model->get_match($id);
    	$this->load->view('admin/row', $data);
    }
    
    
    
    function change_order() {
    	$faq_id 		= 	$this->input->post('faq_id');
    	$faq_order 		= 	$this->input->post('faq_order');
    
    	$faq 			= 	$this->faqs_model->get_match($faq_id); //cate will be changed order position.
    	$order		 	= 	$this->faqs_model->get_match_order($faq_order); // Check 'order' exists or not?
    
    	if (count($order) > 0) {
    		$this->faqs_model->update_order($order['id'], array('order' => $faq->order));
    		$this->faqs_model->update_order($faq_id, array('order' => $faq_order));
    		 
    	} else {
    		$this->faqs_model->update_order($faq_id, array('order' => $faq_order));
    	}
    
    	redirect(admin_url('faqs'), 'refresh');
    }
    
    
    function do_action(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    		 
    		$id_list = $this->input->post('id');
    		$action  = $this->input->post('action');
    
    		if($action == 'delete') {
    			$this->faqs_model->delete_many($id_list);
    		}
    		elseif($action == 'suspend') {
    			$this->faqs_model->update_many($id_list, array('active' => 'no'));
    		}
    		elseif($action == 'active') {
    			$this->faqs_model->update_many($id_list, array('active' => 'yes'));
    		}
    		 
    		die('yes');
    	}
    }
    
    
    function search(){
    	$keyword					=	$this->input->post('search');
    	$cate_id					=	$this->input->post('category');
    	
    	#get info.
    	$search_list				= 	$this->faqs_model->get_search_list($keyword, $cate_id);
    	$fcate_info					=	$this->faqs_model->get_fcate();
    	
    	$delete_faq					=	$this->session->userdata('delete_faq');
    	$this->session->unset_userdata('delete_faq');
    	
    	if(isset($delete_faq) && $delete_faq == 'delete faq'){
    		$inform	=	'delete faq success';
    	}else {
    		$inform = "";
    	}
    	
    	#assign data.
    	$data['inform']				=	$inform;
    	$data['keyword']			=	$keyword;
    	$data['fcate_info']			=	$fcate_info;
    	$data['cate_id']			=	$cate_id;
    	$data['search_list']		=	$search_list;
    	$data['act']				=	"faqs";
    	$data['tpl_file']			=	"admin/search_index";
    	$this->load->view('admin/admin_layout/index', $data);
    }
    
    
    
}

/*-----------------------------------------------End---------------------------------------------------*/