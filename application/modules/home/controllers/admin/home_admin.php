<?php

require_once(APPPATH.'controllers/admin_controller'.EXT);
class Home_admin extends Admin_controller {
	
	function __construct(){
		parent::__construct();
		
		$this->load->library(array('form_validation'));
		$this->load->model(array('admin/homead_model'));
	}

	function index(){
		$data['act']		=	"home";
		$data['tpl_file']	=	"admin/home_admin";
		$this->load->view('admin/admin_layout/index', $data);
	}
	
	
	function change_password(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			#validate 
			$this->form_validation->set_rules('old_password','Old Password','required|trim|xss_clean|callback__check_login'); #callback_ is showr in Form_validation libraries which is one kind of function.
			$this->form_validation->set_rules('new_password','New Password','required|trim|xss_clean');
			$this->form_validation->set_rules('conf_password','Confirm New Password','required|trim|xss_clean');
	
			if($this->form_validation->run()===TRUE){
				#get data.
				$info	=	array();
				$info['password']	=	md5($this->input->post('new_password'));
				$acc_id				=	$this->session->userdata('user');
				
				#update password.
				$this->homead_model->change_pass($acc_id['id'], $info);
				$data['success']	=	"You have successfully changed your password!";
			}else{
				$data['error']	=	$this->form_validation->get_error_array();
			}
		}
		
		#assing data.
		$data['act']			=	'adminstrators';
			
		$data['tpl_file']		=	'admin/change_pass';
		$this->load->view('admin/admin_layout/index', $data);
	}
	
	
	
	function _check_login($password){
		#get account info.
		$acc_info	=	$this->session->userdata('user');
		$acc_name	=	$acc_info['username'];
		
		#checking password matches.
		$check_match_pass	=	$this->homead_model->check_match_pass($acc_name, md5($password));
		
		if(!$check_match_pass){
			$this->form_validation->set_message('_check_login','The %s is incorrect !');
			return FALSE;
		}
		return TRUE;
	}
	
	
}
/* End of file Home_admin.php */
