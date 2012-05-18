<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ---------------------------------------------------------------
 * Author  : Anthony Tran
 * Email   : Incredibletran@gmail.com - Incredibletran@hotmail.com
 * Version : 1.0
 * ---------------------------------------------------------------
*/
require_once(APPPATH.'controllers/admin_controller'.EXT);
class Slider_admin extends Admin_controller {
	
	
	function __construct(){
        parent::__construct(); 
        $this->load->model(array('admin/slider_model'));
        $this->load->library(array('session','upload'));
		$this->load->helper(array('link','upload','text'));
    }
    
    
    function index(){
    	#get data.
    	$slide_list					=	$this->slider_model->get_all();
    	
	    $slide_url					=	$this->selfURL();
	    $this->session->set_userdata('slide_url', $slide_url);
	    $delete_slide				=	$this->session->userdata('delete_slide');
	    $this->session->unset_userdata('delete_slide');
	     
	    if(isset($delete_slide) && $delete_slide == 'delete slide'){
	    	$inform	=	'delete slide success';
	    }else {
	    	$inform = "";
	    }
    	
	    $data['current_url']		=	$slide_url;
    	$data['slide_list']			=	$slide_list;
    	$data['inform']				=	$inform;
    	$data['act']				=	"slider";
    	$data['tpl_file']			=	"admin/index";
    	$this->load->view('admin/admin_layout/index', $data);
    }
    
    
    function add(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST'){
    		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');
    		
    		if($this->form_validation->run() == true){
    			if($_FILES["slide"]["name"]){
    				#make a directory.
    				$info		=	array();
    				$album_dir 	= 	'uploads/slider/';
    				if(!is_dir($album_dir)){
    					create_dir($album_dir);
    				}
    				
    				#check format of the image
    				$ext = get_ext($_FILES["slide"]["name"]);
    				if(!in_array($ext, array('png', 'gif', 'jpg', 'jpeg'))) {
    					die('Sorry! This format is not allowed.');
    				}elseif ($_FILES["slide"]["size"] > 2097152){
    					die('Size of image is too big.');
    				}else{
    					if($this->slider_model->check_exist($this->input->post('name'))) {
    						die('This name is exist!');
    					}elseif ($this->slider_model->check_order_exist($this->input->post('order'))){
    						die('This order is exist !');
    					}else{
    						$config['upload_path']		= 	$album_dir;
    						$config['allowed_types']	= 	'jpg|png|jpeg|gif';
    						$config['file_name']		=	ascii_link($_FILES["slide"]["name"]);
    						$config['max_size']			= 	'2048';
    							
    						$this->load->library('upload', $config);
    						$this->upload->initialize($config);
    						$image						= 	$this->upload->do_upload("slide");
    						if($image) {
	    						#upload execute.
	    						$uploaded_data 			= 	$this->upload->data();
	    						$info['source']			=	$config['upload_path'].$uploaded_data['file_name'];
	    						$info['thumbnail']		=	$config['upload_path'].$uploaded_data['file_name'];
    						} else {
    							die($this->upload->display_errors());
    						}
    							
    						#insert into DB.
    						$info['name']   		= 	$this->input->post('name');
    						$info['name_ascii']   	= 	ascii_link($this->input->post('name'));
    						$info['description']	= 	$this->input->post('description');
    						$info['active']	 		= 	$this->input->post('status');
    						$info['order']			= 	$this->input->post('order');
    						
    						$this->slider_model->add_slide($info);
    						die('yes');
    					}
    				}
    			}else {
    				die('Please choose an image.');
    			}
    		}else{
    			die(validation_errors());
    		}
    	}
    	
    	$data['hello']	=	"";
    	$this->load->view('admin/add', $data);
    }
    
    
    
    function edit($slide_id = ""){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');
    		
    		if($this->form_validation->run() == true){
    			if($this->slider_model->check_exist_edit($slide_id, $this->input->post('name'))) {
    				die('This name is exist!');
    			}elseif ($this->slider_model->check_order_exist_edit($slide_id, $this->input->post('order'))){
    				die('This order is exist !');
    			}else{
    				if($_FILES["slide"]["name"]){
    					$info		=	array();
    					$album_dir 	= 	'uploads/slider/';
    				
    					#check format of the image
    					$ext = get_ext($_FILES["slide"]["name"]);
    				    if(!in_array($ext, array('png', 'gif', 'jpg', 'jpeg'))) {
    				    	die('Sorry! This format is not allowed.');
    				    }elseif ($_FILES["slide"]["size"] > 2097152){
    						die('Size of image is too big.');
    				    }else {
    					
	    				    #delete old image.
	    					$old_slide					=	$this->input->post('slide_hidden');
    				    	if(file_exists($old_slide)){
    				    		unlink($old_slide);
    				    	}
	    					
	    						
	    				    #update new image.
	    					$config['upload_path']		= 	$album_dir;
	    					$config['allowed_types']	= 	'jpg|png|jpeg|gif';
	    					$config['max_size']			= 	'2048';
	    				
	    				    $this->load->library('upload', $config);
	    				    $this->upload->initialize($config);
	    					$image						= 	$this->upload->do_upload("slide");
	    					if($image) {
		    					#upload execute.
		    					$uploaded_data 				= 	$this->upload->data();
		    					$info['source']				=	$config['upload_path'].$uploaded_data['file_name'];
		    					$info['thumbnail']			=	$config['upload_path'].$uploaded_data['file_name'];
	    					}else{
	    				    	die('Upload process has failed. Please try again!');
	    					}
    					}
    				}else {
    				    $info['source']				=	"";
    				    $info['thumbnail']			=	"";
    				}
    					 
    				#insert into DB.
    				$info['name']   		= 	$this->input->post('name');
    				$info['name_ascii']   	= 	ascii_link($this->input->post('name'));
    				$info['description']	= 	$this->input->post('description');
    				$info['active']	 		= 	$this->input->post('status');
    				$info['order']			= 	$this->input->post('order');
    					 
    				$this->slider_model->edit_slide($slide_id, $info);
    				die('yes');
    			}
    		}
    	}
    	
    	#get info from DB.
    	$slide_info			=	$this->slider_model->get_match($slide_id);

    	$data['current_url']=	$this->session->userdata('slide_url');
    	$data['slide_info']	=	$slide_info;
    	$data['slide_id']	=	$slide_id;
    	$this->load->view('admin/edit', $data);
    }
    
    
    
    function delete($slide_id){
    	#delete in album.
    	$slide		=	$this->slider_model->get_match($slide_id);
    	if(file_exists($slide->source)){
    		unlink($slide->source);
    	}
    	
    	
    	#delete in DB.
    	$this->slider_model->delete($slide_id);
     
	    $delete	=	"delete slide";
	    $this->session->set_userdata('delete_slide', $delete);
	    
	    $url	=	$this->session->userdata('slide_url');
	    redirect($url,'refresh');
    }
    
    
    
    function change_status(){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$id     		= $this->input->post('id');
    		$status 		= $this->input->post('status');
    		 
    		$info			=	array();
    		$info['active']	=	$status;
    		 
    		$this->slider_model->change_status($id, $info);
    		die('yes');
    	}
    }
    
    
    function load_row($id = ''){
    	$data['slider'] = $this->slider_model->get_match($id);
    	$this->load->view('admin/row', $data);
    }
    
    
    
    function change_order() {
    	$slide_id 		= 	$this->input->post('slide_id');
    	$slide_order 	= 	$this->input->post('slide_order');
    
    	$slide 			= 	$this->slider_model->get_match($slide_id); //cate will be changed order position.
    	$order		 	= 	$this->slider_model->get_match_order($slide_order); // Check 'order' exists or not?
    
    	if (count($order) > 0) {
    		$this->slider_model->update_order($order['id'], array('order' => $slide->order));
    		$this->slider_model->update_order($slide_id, array('order' => $slide_order));
    		 
    	} else {
    		$this->slider_model->update_order($slide_id, array('order' => $slide_order));
    	}
    
    	$url	=	$this->session->userdata('slide_url');
	    redirect($url,'refresh');
    }
    
    
    function do_action(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    		 
    		$id_list = $this->input->post('id');
    		$action  = $this->input->post('action');
    
    		if($action == 'delete') {
    			$this->slider_model->delete_many($id_list);
    		}
    		elseif($action == 'suspend') {
    			$this->slider_model->update_many($id_list, array('active' => 'no'));
    		}
    		elseif($action == 'active') {
    			$this->slider_model->update_many($id_list, array('active' => 'yes'));
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

/*---------------------------------------------End-----------------------------------------*/