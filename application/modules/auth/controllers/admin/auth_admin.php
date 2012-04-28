<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Auth_admin extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('link'));
		$this->load->library(array("form_validation"));
		$this->load->model(array('admin/auth_model'));
	
	}

	function index(){
		redirect('auth_admin/login');
	}
	
	
	function login(){
		if(isset($this->session->userdata['user']['id'])){
			redirect('home_admin');
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$username = trim($this->input->post('username'));
			$password = md5($this->input->post('password'));
			
			$result = $this->auth_model->check_user($username, $password);
			if($result != FALSE){
				$this->session->set_userdata('user', $result[0]);
				redirect('home_admin');
			}else{
				$data['name']	=	$username;
				$data['pass']	=	$password;
				$data['error']	=	"Password or Username is incorrenct !";
			} 
		}
		$data['tpl_file']	=	"";
		$this->load->view('admin/login', $data);
	}
	
	
	function logout(){
		$this->session->unset_userdata('user');
		redirect('home_admin/login');
	}
	
	
	function forgot_password(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			#set rules
			$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|xss_clean');
			#assign data.
			$data['username']	=	$this->input->post('username');
			$data['email']		=	$this->input->post('email');
			
			if($this->form_validation->run() == true){
				#get data.
				$user	=	$this->input->post('username');
				$email	=	$this->input->post('email');
				
				#check in db.
				$result	=	$this->auth_model->forgot_pass($user, $email);
				if($result == true){
					$status	=	$result['active'];
					if($status	==	'no'){
						#assign data.
						$data['username']	=	$user;
						$data['email']		=	$email;
						$data['error']	=	"Sorry! Your account has been deactivated.";		
					}else {
						#assign data.
						$data['username']	=	$user;
						$data['email']		=	$email;
						$data['inform']		=	"A new password has been sent to your email!";
					}
				}else {
					#assign data.
					$data['username']	=	$user;
					$data['email']		=	$email;
					$data['error']	=	"Username or Email is incorrect!";
				}
			} 
		}
		$data['tpl_file']	=	"";
		$this->load->view('admin/forgot', $data);
	}
	
	


}

/* End of file auth_admin.php */