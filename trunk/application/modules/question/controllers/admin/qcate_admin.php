<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ---------------------------------------------------------------
 * Author  : Anthony Tran
 * Email   : Incredibletran@gmail.com - Incredibletran@hotmail.com
 * Version : 1.0
 * ---------------------------------------------------------------
*/
require_once(APPPATH.'controllers/admin_controller'.EXT);
class Qcate_admin extends Admin_controller {
	
	
	function __construct(){
        parent::__construct(); 
        $this->load->model(array('admin/qcate_model'));
        $this->load->library(array('session','upload'));
		$this->load->helper(array('link','upload','text'));
    }
    
    
    function index(){
    	
    	$qcate_list					= 	$this->qcate_model->get_all();
    	
    	$qcate_url				=	$this->selfURL();
    	$this->session->set_userdata('qcate_url', $qcate_url);
	    $delete_qcate				=	$this->session->userdata('delete_qcate');
	    $this->session->unset_userdata('delete_qcate');
	     
	    if(isset($delete_qcate) && $delete_qcate == 'delete qcate'){
	    	$inform	=	'delete qcate success';
	    }else {
	    	$inform = "";
	    }
    	
	    $data['current_url']		=	$qcate_url;
    	$data['qcate_list']			=	$qcate_list;
    	$data['inform']				=	$inform;
    	$data['act']				=	"qcate";
    	$data['tpl_file']			=	"admin/qcate_index";
    	$this->load->view('admin/admin_layout/index', $data);
    }
    
    
    function add(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST'){
    		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');
    		
    		if($this->form_validation->run() == true){
    			$info = array(
    			    	        'name'   		=> $this->input->post('name'),
    			    			'name_ascii'   	=> ascii_link($this->input->post('name')),
    			    			'active'	 	=> $this->input->post('status'),
    			    			'order'			=> $this->input->post('order')
    			);
    			 
    			if($this->qcate_model->check_exist($info['name'])) {
    				die('This username is exist!');
    			}elseif ($this->qcate_model->check_order_exist($info['order'])){
    				die('This order is exist !');
    			}else{
    				$this->qcate_model->add_qcate($info);
    				die('yes');
    			}
    		}else{
    			die(validation_errors());
    		}
    	}
    	
    	$data['qcate_info']	=	"";
    	$this->load->view('admin/qcate_add', $data);
    }
    
    
    
    function edit($qcate_id = ""){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');
    		
    		if($this->form_validation->run() == true){
    			$info = array(
    		    			    'name'   		=> $this->input->post('name'),
    		    			    'name_ascii'   	=> ascii_link($this->input->post('name')),
    		    			    'active'	 	=> $this->input->post('status'),
    		    			    'order'			=> $this->input->post('order')
    						 );
    		
    			if($this->qcate_model->check_exist_edit($qcate_id, $info['name'])) {
    				die('This username is exist!');
    			}elseif ($this->qcate_model->check_order_exist_edit($qcate_id, $info['order'])){
    				die('This order is exist !');
    			}else{
    				$this->qcate_model->edit_qcate($qcate_id, $info);
    				#edit cate in faqs
    				$this->qcate_model->edit_question_match($qcate_id, array('cate_name' => $info['name']));
    				die('yes');
    			}
    		}else{
    			die(validation_errors());
    		}
    		
    	}
    	
    	#get info from DB.
    	$qcate_info				=	$this->qcate_model->get_match($qcate_id);

    	$data['current_url']	=	$this->session->userdata('qcate_url');
    	$data['qcate_info']		=	$qcate_info;
    	$this->load->view('admin/qcate_edit', $data);
    }
    
    
    
    function delete($qcate_id){
    	
    	$question_list	=	$this->qcate_model->get_question_list($qcate_id);
    	
    	if($question_list){
    		for($i = 0; $i < count($question_list); $i++){
    			$this->qcate_model->delete_answer($question_list[$i]->id);
    		}
    	}
    	
    	#delete its' question.
    	$this->qcate_model->delete_many_question($qcate_id);
    	
    	#delete cate in DB.
    	$this->qcate_model->delete($qcate_id);
     
	    $delete	=	"delete qcate";
	    $this->session->set_userdata('delete_qcate', $delete);
	    
	    $url	=	$this->session->userdata('qcate_url');
	    redirect($url, 'refresh');
    }
    
    
    
    function change_status(){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$id     		= $this->input->post('id');
    		$status 		= $this->input->post('status');
    		 
    		$info			=	array();
    		$info['active']	=	$status;
    		 
    		$this->qcate_model->change_status($id, $info);
    		die('yes');
    	}
    }
    
    
    function load_row($id = ''){
    
    	$data['qcate'] = $this->qcate_model->get_match($id);
    	$this->load->view('admin/qcate_row', $data);
    }
    
    
    
    function change_order() {
    	$qcate_id 		= 	$this->input->post('qcate_id');
    	$qcate_order 	= 	$this->input->post('qcate_order');
    
    	$qcate 			= 	$this->qcate_model->get_match($qcate_id); //cate will be changed order position.
    	$order		 	= 	$this->qcate_model->get_match_order($qcate_order); // Check 'order' exists or not?
    
    	if (count($order) > 0) {
    		$this->qcate_model->update_order($order['id'], array('order' => $qcate->order));
    		$this->qcate_model->update_order($qcate_id, array('order' 	 => $qcate_order));
    		 
    	} else {
    		$this->qcate_model->update_order($qcate_id, array('order' => $qcate_order));
    	}
    
    	redirect(admin_url('question-category'), 'refresh');
    }
    
    
    function do_action(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    		 
    		$id_list = $this->input->post('id');
    		$action  = $this->input->post('action');
    
    		if($action == 'delete') {
    			$this->qcate_model->delete_many($id_list);
    		}
    		elseif($action == 'suspend') {
    			$this->qcate_model->update_many($id_list, array('active' => 'no'));
    		}
    		elseif($action == 'active') {
    			$this->qcate_model->update_many($id_list, array('active' => 'yes'));
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

/*----------------------------------------------End-----------------------------------------*/