<?php

class Admin_controller extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		//$sess	=	$this->session->userdata('user');	
		if(!isset($this->session->userdata['user']['id'])){
			redirect('home_admin/login', 'refresh');
		}
		
		$this->load->helper(array('link'));
	}
	
}
//End class Amin.