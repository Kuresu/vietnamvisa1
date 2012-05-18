<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ---------------------------------------------------------------
 * Author  : Anthony Tran
 * Email   : Incredibletran@gmail.com - Incredibletran@hotmail.com
 * Version : 1.0
 * ---------------------------------------------------------------
*/
require_once(APPPATH.'controllers/admin_controller'.EXT);
class Country_admin extends Admin_controller {
	
	
	function __construct(){
        parent::__construct(); 
        $this->load->model(array('admin/country_model'));
        $this->load->library(array('session','upload'));
		$this->load->helper(array('link','upload','text'));
    }
    
    
    function index(){
    	#get filter_parent
    	if(isset($_REQUEST['continent_filter'])) {
    		$filter_continent	= $_REQUEST['continent_filter'];
    		$this->session->set_userdata('filter_continent_parent',$filter_continent);
    	} else {
    		if($this->session->userdata('filter_continent_parent')) {
    			$filter_continent = $this->session->userdata('filter_continent_parent');
    		} else {
    			$filter_continent = '-1';
    			$this->session->set_userdata('filter_continent_parent',$filter_continent);
    		}
    	}
    	
    	#get number item on perpage.
    	if(isset($_REQUEST['perpage'])) {
    		$perpage		= 	$_REQUEST['perpage'];
    		$this->session->set_userdata('country_perpage',$perpage);
    	} else {
    		if($this->session->userdata('country_perpage')) {
    			$perpage	= 	$this->session->userdata('country_perpage');
    		} else {
    			$perpage 	= 	'12';
    			$this->session->set_userdata('country_perpage',$perpage);
    		}
    	}
    	
    	#get total item in DB.
    	$total_country				= 	$this->country_model->get_menu_filter($filter_continent);
    	$this->load->library('pagination');
    	$config['total_rows'] 		= 	$total_country;
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
    	$config['base_url']			= 	admin_url().'/country/';
    	$config['uri_segment']		= 	3;
    	$this->pagination->initialize($config);
    	
    	$pagination					= 	$this->pagination->create_links();
    	$offset 					= 	($this->uri->segment(3)=='') ? 0 : $this->uri->segment(3);
    	
    	#get info.
    	$country_list				= 	$this->country_model->get_country_list($filter_continent, $perpage, $offset);
    	
    	$current_url				=	$this->selfURL();
    	$this->session->set_userdata('url_edit_country', $current_url);
	    $delete_country				=	$this->session->userdata('delete_country');
	    $this->session->unset_userdata('delete_country');
	     
	    if(isset($delete_country) && $delete_country == 'delete country'){
	    	$inform	=	'delete country success';
	    }else {
	    	$inform = "";
	    }
    	$data['url_status_country']	=	$current_url;
	    $data['current_filter']		= 	$this->session->userdata('filter_continent_parent');
	    $data['pagination']			=	$pagination;
	    $data['current_perpage']	=	$perpage;
    	$data['country_list']		=	$country_list;
    	$data['inform']				=	$inform;
    	$data['act']				=	"country";
    	$data['tpl_file']			=	"admin/index";
    	$this->load->view('admin/admin_layout/index', $data);
    }
    
    
    function add(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST'){
    		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');
    		
    		if($this->form_validation->run() == true){
    			if($_FILES["flag_icon"]["name"]){
    				#make a directory.
    				$info		=	array();
	    			$album_dir 	= 	'uploads/flag/';
	    			if(!is_dir($album_dir)){
	    				create_dir($album_dir);
	    			}
	    			#check format of the image
	    			$ext = get_ext($_FILES["flag_icon"]["name"]);
	    			if(!in_array($ext, array('png'))) {
	    				die('Sorry! This format is not allowed.');
	    			}elseif ($_FILES["flag_icon"]["size"] > 5000){
	    				die('Size of icon is too big.');
	    			}else{
	    				if($this->country_model->check_exist($this->input->post('name'))) {
	    					die('This name is exist!');
	    				}else{
	    					$config['upload_path']		= 	$album_dir;
	    					$config['allowed_types']	= 	'png';
	    					$config['file_name']		=	ascii_link($_FILES["flag_icon"]["name"]);
	    					$config['max_size']			= 	'5';
	    						
	    					$this->load->library('upload', $config);
	    					$this->upload->initialize($config);
	    					$image						= 	$this->upload->do_upload("flag_icon");
	    					if($image) {
		    					#upload execute.
		    					$uploaded_data 			= 	$this->upload->data();
		    					$info['flag_icon']		=	$config['upload_path'].$uploaded_data['file_name'];
	    					} else {
	    						die($this->upload->display_errors());
	    					}
	    					
	    					#insert into DB.
	    					$info['name']   		= 	$this->input->post('name');
	    					$info['name_ascii']   	= 	ascii_link($this->input->post('name'));
	    					$info['active']	 		= 	$this->input->post('status');
	    					$info['required']		=	$this->input->post('visa_required');
	    					$info['show_off']		=	$this->input->post('show_off');
	    					$info['continent']		=	$this->input->post('continent');
	    					
	    					$this->country_model->add_country($info);
	    					die('yes');
	    				}
	    			}
    			}else {
    				die('Please choose an icon.');
    			}
    		}else{
    			die(validation_errors());
    		}
    	}
    	#get data.
    	
    	$data['hello']			=	"";
    	$this->load->view('admin/add', $data);
    }
    
    
    
    function edit($country_id = ""){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');
    		
    		if($this->form_validation->run() == true){
    			if($this->country_model->check_exist_edit($country_id, $this->input->post('name'))) {
    				die('This name is exist!');
    			}else{
    				if($_FILES["flag_icon"]["name"]){
    					$info		=	array();
    					$album_dir 	= 	'uploads/flag/';
    				
    					#check format of the image
    					$ext = get_ext($_FILES["flag_icon"]["name"]);
    					if(!in_array($ext, array('png'))) {
    						die('Sorry! This format is not allowed.');
    				    }elseif ($_FILES["flag_icon"]["size"] > 5000){
    						die('Size of icon is too big.');
    					}else {
    						#delete old image.
    						$old_flag_icon					=	$this->input->post('flag_hidden');
    						if(file_exists($old_flag_icon)){
    							unlink($old_flag_icon);
    						}
    						
    							
    						#update new image.
    						$config['upload_path']		= 	$album_dir;
    						$config['allowed_types']	= 	'png';
    						$config['max_size']			= 	'5';
    						 
    						$this->load->library('upload', $config);
    						$this->upload->initialize($config);
    						$image						= 	$this->upload->do_upload("flag_icon");
    						if($image) {
	    						#upload execute.
	    						$uploaded_data 				= 	$this->upload->data();
	    						$info['flag_icon']			=	$config['upload_path'].$uploaded_data['file_name'];
    						}else{
    							die('Upload process has failed. Please try again!');
    						}
    					}
    				}else {
    					$info['flag_icon']				=	"";
    				}
    				
    				#insert into DB.
    				
    				$info['name']   		= 	$this->input->post('name');
    				$info['name_ascii']   	= 	ascii_link($this->input->post('name'));
    				$info['active']	 		= 	$this->input->post('status');
    				$info['required']		=	$this->input->post('visa_required');
    				$info['show_off']		=	$this->input->post('show_off');
    				$info['continent']		=	$this->input->post('continent');
    				
    				$this->country_model->edit_country($country_id, $info);
    				die('yes');
    			}
    		}else{
    			die(validation_errors());
    		}
    	}
    	
    	#get info from DB.
    	$country_info			=	$this->country_model->get_match($country_id);
		
    	$data['current_url']	=	$this->session->userdata('url_edit_country');
    	$data['country_info']	=	$country_info;
    	$this->load->view('admin/edit', $data);
    }
    
    
    
    function delete($country_id){
    	#delete in album.
    	$flag_icon		=	$this->country_model->get_match($country_id);
    	if(file_exists($flag_icon->flag_icon)){
    		unlink($flag_icon->flag_icon);
    	}
    	
    	
    	#delete in DB.
    	$this->country_model->delete($country_id);
     
	    $delete	=	"delete country";
	    $this->session->set_userdata('delete_country', $delete);
	    redirect(admin_url('country'),'refresh');
    }
    
    
    
    function change_status(){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$id     		= $this->input->post('id');
    		$status 		= $this->input->post('status');
    		 
    		$info			=	array();
    		$info['active']	=	$status;
    		 
    		$this->country_model->change_status($id, $info);
    		die('yes');
    	}
    }
    
    
    function load_row($id = ''){
    	$data['current_url']	=	$this->session->userdata('url_edit_country');
    	$data['country'] 		= 	$this->country_model->get_match($id);
    	$this->load->view('admin/row', $data);
    }
    
    
    
    function change_order() {
    	$country_id 		= 	$this->input->post('country_id');
    	$country_order 		= 	$this->input->post('country_order');
    
    	$country 			= 	$this->country_model->get_match($country_id); //cate will be changed order position.
    	$order		 	= 	$this->country_model->get_match_order($country_order); // Check 'order' exists or not?
    
    	if (count($order) > 0) {
    		$this->country_model->update_order($order['id'], array('order' => $country->order));
    		$this->country_model->update_order($country_id, array('order' => $country_order));
    		 
    	} else {
    		$this->country_model->update_order($country_id, array('order' => $country_order));
    	}
    
    	redirect(admin_url('country'), 'refresh');
    }
    
    
    function do_action(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    		 
    		$id_list = $this->input->post('id');
    		$action  = $this->input->post('action');
    
    		if($action == 'delete') {
    			for($i = 0; $i < count($id_list); $i++){
    				$country_list	=	$this->country_model->get_match($id_list[$i]);
			    	
    				if($country_list){
    					#delete in album.
    					$flag_icon		=	$this->country_model->get_match($country_list->id);
    					if(file_exists($flag_icon->flag_icon)){
    						unlink($flag_icon->flag_icon);
    					}
    					#delete in DB.
    					$this->country_model->delete($country_list->id);
    				}
    			}
    		}
    		elseif($action == 'suspend') {
    			$this->country_model->update_many($id_list, array('active' => 'no'));
    		}
    		elseif($action == 'active') {
    			$this->country_model->update_many($id_list, array('active' => 'yes'));
    		}
    		 
    		die('yes');
    	}
    }
    
    
    function search(){
    	$keyword					=	$this->input->post('search');
    	$cate_id					=	$this->input->post('category');
    	
    	#get info.
    	$search_list				= 	$this->country_model->get_search_list($keyword, $cate_id);
    	$fcate_info					=	$this->country_model->get_fcate();
    	
    	$delete_country					=	$this->session->userdata('delete_country');
    	$this->session->unset_userdata('delete_country');
    	
    	if(isset($delete_country) && $delete_country == 'delete country'){
    		$inform	=	'delete country success';
    	}else {
    		$inform = "";
    	}
    	
    	#assign data.
    	$data['inform']				=	$inform;
    	$data['keyword']			=	$keyword;
    	$data['fcate_info']			=	$fcate_info;
    	$data['cate_id']			=	$cate_id;
    	$data['search_list']		=	$search_list;
    	$data['act']				=	"country";
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

/*-----------------------------------------------End---------------------------------------------------*/