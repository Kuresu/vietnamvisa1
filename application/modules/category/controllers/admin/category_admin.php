<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'controllers/admin_controller'.EXT);
class Category_admin extends Admin_controller {
	
	
	function __construct(){
        parent::__construct(); 
       // $this->load->model(array('admin/page_model'));
        $this->load->library(array('session','upload'));
		$this->load->helper(array('link'));
    }
    
    
    function index(){
    	
    	$data['act']				=	"category";
    	$data['tpl_file']			=	"admin/index";
    	$this->load->view('admin/admin_layout/index', $data);
    }
    
    
}
//End Page_admin