<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'controllers/admin_controller'.EXT);
class Fcate_admin extends Admin_controller {
	
	
	function __construct(){
        parent::__construct(); 
        $this->load->model(array('admin/fcate_model'));
        $this->load->library(array('session','upload'));
		$this->load->helper(array('link','upload','text'));
    }
    
    
    function index(){
    	
    	$fcate_list					= 	$this->fcate_model->get_all();
    	
    
	    $delete_fcate				=	$this->session->userdata('delete_fcate');
	    $this->session->unset_userdata('delete_fcate');
	     
	    if(isset($delete_fcate) && $delete_fcate == 'delete fcate'){
	    	$inform	=	'delete fcate success';
	    }else {
	    	$inform = "";
	    }
    	
    	$data['fcate_list']			=	$fcate_list;
    	$data['inform']				=	$inform;
    	$data['act']				=	"fcate";
    	$data['tpl_file']			=	"admin/fcate_index";
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
    			 
    			if($this->fcate_model->check_exist($info['name'])) {
    				die('This username is exist!');
    			}elseif ($this->fcate_model->check_order_exist($info['order'])){
    				die('This order is exist !');
    			}else{
    				$this->fcate_model->add_fcate($info);
    				die('yes');
    			}
    		}else{
    			die(validation_errors());
    		}
    	}
    	
    	$data['fcate_info']	=	"";
    	$this->load->view('admin/fcate_add', $data);
    }
    
    
    
    function edit($fcate_id = ""){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');
    		
    		if($this->form_validation->run() == true){
    			$info = array(
    		    			    'name'   		=> $this->input->post('name'),
    		    			    'name_ascii'   	=> ascii_link($this->input->post('name')),
    		    			    'active'	 	=> $this->input->post('status'),
    		    			    'order'			=> $this->input->post('order')
    						 );
    		
    			if($this->fcate_model->check_exist_edit($fcate_id, $info['name'])) {
    				die('This username is exist!');
    			}elseif ($this->fcate_model->check_order_exist_edit($fcate_id, $info['order'])){
    				die('This order is exist !');
    			}else{
    				$this->fcate_model->edit_fcate($fcate_id, $info);
    				#edit cate in faqs
    				$this->fcate_model->edit_faqs_match($fcate_id, array('cate_name' => $info['name']));
    				die('yes');
    			}
    		}else{
    			die(validation_errors());
    		}
    		
    	}
    	
    	#get info from DB.
    	$fcate_info			=	$this->fcate_model->get_match($fcate_id);
    	 
    	$data['fcate_info']	=	$fcate_info;
    	$data['fcate_id']	=	$fcate_id;
    	$this->load->view('admin/fcate_edit', $data);
    }
    
    
    
    function delete($fcate_id){
    	#delete its' faqs.
    	$this->fcate_model->delete_many_faqs($fcate_id);
    	#delete cate in DB.
    	$this->fcate_model->delete($fcate_id);
     
	    $delete	=	"delete fcate";
	    $this->session->set_userdata('delete_fcate', $delete);
	    redirect(admin_url('faqs-category'),'refresh');
    }
    
    
    
    function change_status(){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$id     		= $this->input->post('id');
    		$status 		= $this->input->post('status');
    		 
    		$info			=	array();
    		$info['active']	=	$status;
    		 
    		$this->fcate_model->change_status($id, $info);
    		die('yes');
    	}
    }
    
    
    function load_row($id = ''){
    
    	$data['fcate'] = $this->fcate_model->get_match($id);
    	$this->load->view('admin/fcate_row', $data);
    }
    
    
    
    function change_order() {
    	$fcate_id 		= 	$this->input->post('fcate_id');
    	$fcate_order 	= 	$this->input->post('fcate_order');
    
    	$fcate 			= 	$this->fcate_model->get_match($fcate_id); //cate will be changed order position.
    	$order		 	= 	$this->fcate_model->get_match_order($fcate_order); // Check 'order' exists or not?
    
    	if (count($order) > 0) {
    		$this->fcate_model->update_order($order['id'], array('order' => $fcate->order));
    		$this->fcate_model->update_order($fcate_id, array('order' 	 => $fcate_order));
    		 
    	} else {
    		$this->fcate_model->update_order($fcate_id, array('order' => $fcate_order));
    	}
    
    	redirect(admin_url('faqs-category'), 'refresh');
    }
    
    
    function do_action(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    		 
    		$id_list = $this->input->post('id');
    		$action  = $this->input->post('action');
    
    		if($action == 'delete') {
    			$this->fcate_model->delete_many($id_list);
    		}
    		elseif($action == 'suspend') {
    			$this->fcate_model->update_many($id_list, array('active' => 'no'));
    		}
    		elseif($action == 'active') {
    			$this->fcate_model->update_many($id_list, array('active' => 'yes'));
    		}
    		 
    		die('yes');
    	}
    }
    
    
    
}
//End Slider_admin