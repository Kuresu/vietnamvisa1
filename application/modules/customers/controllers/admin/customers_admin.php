<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ---------------------------------------------------------------
 * Author  : Anthony Tran
 * Email   : Incredibletran@gmail.com - Incredibletran@hotmail.com
 * Version : 1.0
 * ---------------------------------------------------------------
*/
require_once(APPPATH.'controllers/admin_controller'.EXT);
class Customers_admin extends Admin_controller {
	
	
	function __construct(){
        parent::__construct(); 
        $this->load->model(array('admin/customers_model'));
        $this->load->library(array('session','upload'));
		$this->load->helper(array('link','upload','text'));
    }
    
    
    function index(){

    	#get filter_parent
    	if(isset($_REQUEST['item_parent'])) {
    		$filter_parent	= $_REQUEST['item_parent'];
    		$this->session->set_userdata('filter_customers_parent',$filter_parent);
    	} else {
    		if($this->session->userdata('filter_customers_parent')) {
    			$filter_parent = $this->session->userdata('filter_customers_parent');
    		} else {
    			$filter_parent = '-1';
    			$this->session->set_userdata('filter_customers_parent',$filter_parent);
    		}
    	}
    	
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
    	$total_quest				= 	$this->customers_model->get_new_filter($filter_parent);
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
    	$config['base_url']			= 	admin_url().'/new-customers/';
    	$config['uri_segment']		= 	3;
    	$this->pagination->initialize($config);
    	
    	$pagination					= 	$this->pagination->create_links();
    	$offset 					= 	($this->uri->segment(3)=='') ? 0 : $this->uri->segment(3);
    	
    	#get info.
    	$customers_list				= 	$this->customers_model->get_new_customers_list($filter_parent, $perpage, $offset);
    	$country					=	$this->customers_model->get_country();
    	
    	$customers_url				=	$this->selfURL();
    	$this->session->set_userdata('customers_url', $customers_url);
	    $delete_customers			=	$this->session->userdata('delete_customers');
	    $this->session->unset_userdata('delete_customers');
	     
	    if(isset($delete_customers) && $delete_customers == 'delete customers'){
	    	$inform	=	'delete customers success';
	    }else {
	    	$inform = "";
	    }
    	
	    #assign data.	
	    $data['current_url']			=	$customers_url;
	    $data['current_filter_parent']	= 	$this->session->userdata('filter_customers_parent');
	    $data['country']				=	$country;
	    $data['pagination']				=	$pagination;
	    $data['current_perpage']		=	$perpage;
    	$data['customers_list']			=	$customers_list;
    	$data['inform']					=	$inform;
    	$data['act']					=	"new";
    	$data['view']					=	"customers";
    	$data['tpl_file']				=	"admin/index";
    	$this->load->view('admin/admin_layout/index', $data);
    }
    
    
    
    function processing(){
    	#get filter_parent
    	if(isset($_REQUEST['item_parent'])) {
    		$filter_parent	= $_REQUEST['item_parent'];
    		$this->session->set_userdata('filter_customers_parent',$filter_parent);
    	} else {
    		if($this->session->userdata('filter_customers_parent')) {
    			$filter_parent = $this->session->userdata('filter_customers_parent');
    		} else {
    			$filter_parent = '-1';
    			$this->session->set_userdata('filter_customers_parent',$filter_parent);
    		}
    	}
    	
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
    	$total_quest				= 	$this->customers_model->get_processing_filter($filter_parent);
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
    	$config['base_url']			= 	admin_url().'/processing-customers/';
    	$config['uri_segment']		= 	3;
    	$this->pagination->initialize($config);
    	 
    	$pagination					= 	$this->pagination->create_links();
    	$offset 					= 	($this->uri->segment(3)=='') ? 0 : $this->uri->segment(3);
    	
    	
    	#get info.
    	$customers_list				= 	$this->customers_model->get_processing_customers_list($filter_parent, $perpage, $offset);
    	$country					=	$this->customers_model->get_country();
    	 
    	$customers_url				=	$this->selfURL();
    	$this->session->set_userdata('customers_url', $customers_url);
    	$delete_customers			=	$this->session->userdata('delete_customers');
    	$this->session->unset_userdata('delete_customers');
    	
    	if(isset($delete_customers) && $delete_customers == 'delete customers'){
    		$inform	=	'delete customers success';
    	}else {
    		$inform = "";
    	}
    	
    	#assign data.
    	$data['current_url']			=	$customers_url;
    	$data['current_filter_parent']	= 	$this->session->userdata('filter_customers_parent');
    	$data['country']				=	$country;
    	$data['pagination']				=	$pagination;
    	$data['current_perpage']		=	$perpage;
    	$data['customers_list']			=	$customers_list;
    	$data['inform']					=	$inform;
    	$data['act']					=	"processing";
    	$data['view']					=	"customers";
    	$data['tpl_file']				=	"admin/index";
    	$this->load->view('admin/admin_layout/index', $data);
    	
    	
    }
    
    
    
    
    function finish(){
    	#get filter_parent
    	if(isset($_REQUEST['item_parent'])) {
    		$filter_parent	= $_REQUEST['item_parent'];
    		$this->session->set_userdata('filter_customers_parent',$filter_parent);
    	} else {
    		if($this->session->userdata('filter_customers_parent')) {
    			$filter_parent = $this->session->userdata('filter_customers_parent');
    		} else {
    			$filter_parent = '-1';
    			$this->session->set_userdata('filter_customers_parent',$filter_parent);
    		}
    	}
    	 
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
    	$total_quest				= 	$this->customers_model->get_finish_filter($filter_parent);
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
    	$config['base_url']			= 	admin_url().'/finish-customers/';
    	$config['uri_segment']		= 	3;
    	$this->pagination->initialize($config);
    	
    	$pagination					= 	$this->pagination->create_links();
    	$offset 					= 	($this->uri->segment(3)=='') ? 0 : $this->uri->segment(3);
    	 
    	 
    	#get info.
    	$customers_list				= 	$this->customers_model->get_finish_customers_list($filter_parent, $perpage, $offset);
    	$country					=	$this->customers_model->get_country();
    	
    	$customers_url				=	$this->selfURL();
    	$this->session->set_userdata('customers_url', $customers_url);
    	$delete_customers			=	$this->session->userdata('delete_customers');
    	$this->session->unset_userdata('delete_customers');
    	 
    	if(isset($delete_customers) && $delete_customers == 'delete customers'){
    		$inform	=	'delete customers success';
    	}else {
    		$inform = "";
    	}
    	    	
    	#assign data.
    	$data['current_url']			=	$customers_url;
    	$data['current_filter_parent']	= 	$this->session->userdata('filter_customers_parent');
    	$data['country']				=	$country;
    	$data['pagination']				=	$pagination;
    	$data['current_perpage']		=	$perpage;
    	$data['customers_list']			=	$customers_list;
    	$data['inform']					=	$inform;
    	$data['act']					=	"finish";
    	$data['view']					=	"customers";
    	$data['tpl_file']				=	"admin/index";
    	$this->load->view('admin/admin_layout/index', $data);
    	
    	
    }
    
    
    
    function refund(){
    	#get filter_parent
    	if(isset($_REQUEST['item_parent'])) {
    		$filter_parent	= $_REQUEST['item_parent'];
    		$this->session->set_userdata('filter_customers_parent',$filter_parent);
    	} else {
    		if($this->session->userdata('filter_customers_parent')) {
    			$filter_parent = $this->session->userdata('filter_customers_parent');
    		} else {
    			$filter_parent = '-1';
    			$this->session->set_userdata('filter_customers_parent',$filter_parent);
    		}
    	}
    	
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
    	$total_quest				= 	$this->customers_model->get_refund_filter($filter_parent);
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
    	$config['base_url']			= 	admin_url().'/refund-customers/';
    	$config['uri_segment']		= 	3;
    	$this->pagination->initialize($config);
    	 
    	$pagination					= 	$this->pagination->create_links();
    	$offset 					= 	($this->uri->segment(3)=='') ? 0 : $this->uri->segment(3);
    	
    	#get info.
    	$customers_list				= 	$this->customers_model->get_refund_customers_list($filter_parent, $perpage, $offset);
    	$country					=	$this->customers_model->get_country();
    	 
    	$customers_url				=	$this->selfURL();
    	$this->session->set_userdata('customers_url', $customers_url);
    	$delete_customers			=	$this->session->userdata('delete_customers');
    	$this->session->unset_userdata('delete_customers');
    	
    	if(isset($delete_customers) && $delete_customers == 'delete customers'){
    		$inform	=	'delete customers success';
    	}else {
    		$inform = "";
    	}
    	
    	#assign data.
    	$data['current_url']			=	$customers_url;
    	$data['current_filter_parent']	= 	$this->session->userdata('filter_customers_parent');
    	$data['country']				=	$country;
    	$data['pagination']				=	$pagination;
    	$data['current_perpage']		=	$perpage;
    	$data['customers_list']			=	$customers_list;
    	$data['inform']					=	$inform;
    	$data['act']					=	"refund";
    	$data['view']					=	"customers";
    	$data['tpl_file']				=	"admin/index";
    	$this->load->view('admin/admin_layout/index', $data);
    }
    
    
    
    function junk(){
    	#get filter_parent
    	if(isset($_REQUEST['item_parent'])) {
    		$filter_parent	= $_REQUEST['item_parent'];
    		$this->session->set_userdata('filter_customers_parent',$filter_parent);
    	} else {
    		if($this->session->userdata('filter_customers_parent')) {
    			$filter_parent = $this->session->userdata('filter_customers_parent');
    		} else {
    			$filter_parent = '-1';
    			$this->session->set_userdata('filter_customers_parent',$filter_parent);
    		}
    	}
    	 
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
    	$total_quest				= 	$this->customers_model->get_junk_filter($filter_parent);
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
    	$config['base_url']			= 	admin_url().'/deleted-customers/';
    	$config['uri_segment']		= 	3;
    	$this->pagination->initialize($config);
    	
    	$pagination					= 	$this->pagination->create_links();
    	$offset 					= 	($this->uri->segment(3)=='') ? 0 : $this->uri->segment(3);
    	 
    	#get info.
    	$customers_list				= 	$this->customers_model->get_junk_customers_list($filter_parent, $perpage, $offset);
    	$country					=	$this->customers_model->get_country();
    	
    	$customers_url				=	$this->selfURL();
    	$this->session->set_userdata('customers_url', $customers_url);
    	$delete_customers			=	$this->session->userdata('delete_customers');
    	$this->session->unset_userdata('delete_customers');
    	 
    	if(isset($delete_customers) && $delete_customers == 'delete customers'){
    		$inform	=	'delete customers success';
    	}else {
    		$inform = "";
    	}
    	    	
    	#assign data.
    	$data['current_url']			=	$customers_url;
    	$data['current_filter_parent']	= 	$this->session->userdata('filter_customers_parent');
    	$data['country']				=	$country;
    	$data['pagination']				=	$pagination;
    	$data['current_perpage']		=	$perpage;
    	$data['customers_list']			=	$customers_list;
    	$data['inform']					=	$inform;
    	$data['act']					=	"deleted";
    	$data['view']					=	"customers";
    	$data['tpl_file']				=	"admin/index";
    	$this->load->view('admin/admin_layout/index', $data);
    }
    
    
    
    function edit($customers_id = ""){
    	#get info from DB.
    	$customer_info				=	$this->customers_model->get_match($customers_id);
		
    	$data['customer_info']		=	$customer_info;
    	$this->load->view('admin/edit', $data);
    }
    
    
    function applicants($customers_id = ""){
    	#get info from DB.
    	$customer_info				=	$this->customers_model->get_match($customers_id);
    	$applicants_info			=	$this->customers_model->get_applicants($customers_id);
    	
    	$data['applicants_info']	=	$applicants_info;
    	$data['customer_info']		=	$customer_info;
    	$this->load->view('admin/applicants', $data);
    }
    
    
    function delete($customers_id){
    	$this->customers_model->update_many($customers_id, array('status' => 'delete'));
    	
	    $delete	=	"delete customers";
	    $this->session->set_userdata('delete_customers', $delete);
	    
	    $url	=	$this->session->userdata('customers_url');
	    redirect($url, 'refresh');
    }
    
    
    
    function change_status(){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$id     		= $this->input->post('id');
    		$status 		= $this->input->post('status');
    		 
    		$info			=	array();
    		$info['active']	=	$status;
    		 
    		$this->customers_model->change_status($id, $info);
    		die('yes');
    	}
    }
    
    
    function load_row($id = ''){
    	$data['current_url']	=	$this->session->userdata('customers_url');
    	$data['customers'] 		= 	$this->customers_model->get_match($id);
    	$this->load->view('admin/row', $data);
    }
    
    
    
    function do_action(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    		 
    		$id_list = $this->input->post('id');
    		$action  = $this->input->post('action');
    		if($action != 'sendmail'){
    			$this->customers_model->update_many($id_list, array('status' => $action));
    		}else{
    			
    			exit('send mail de.');
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