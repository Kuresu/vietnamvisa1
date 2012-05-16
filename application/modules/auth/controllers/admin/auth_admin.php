<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * ---------------------------------------------------------------
 * Author  : Anthony Tran
 * Email   : Incredibletran@gmail.com - Incredibletran@hotmail.com
 * Version : 1.0
 * ---------------------------------------------------------------
*/
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
			redirect(admin_url());
		}else {
			#check autologin
			$cookie_name	=	'siteAuth';
			// Check if the cookie exists
			if(isset($_COOKIE[$cookie_name])){
				parse_str($_COOKIE[$cookie_name]);
				// Register the session
				$user_info	=	array(
										'username'	=> $user,
										'password'	=> $password
									 );
				$this->session->set_userdata('username', $user_info);
			}
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$username 	= 	trim($this->input->post('username'));
			$password 	= 	md5($this->input->post('password'));
			$autologin	=	$this->input->post('autologin');
			
			$result = $this->auth_model->check_user($username, $password);
			if($result != FALSE){
				if($autologin == 1){
					$cookie_name	=	'siteAuth';
					$cookie_time	=	3600*24*30; // 30 days.
					setcookie ($cookie_name, 'user='.$username.'&password='.$password, time() + $cookie_time);
				}
				$this->session->set_userdata('user', $result[0]);
				redirect(admin_url());
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
		redirect(admin_url('login'));
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
						$data['error']		=	"Sorry! Your account has been deactivated.";		
					}else {
						#set a new password.
						$newpass			=	rand(1234563, 92342339);
						$info				=	array();
						$info['password']	=	md5($newpass);
						$this->auth_model->set_new_pass($result['id'], $info);
						
						#send new pass to email.
						$send	=	$this->send_email($result['id'], $newpass);
						if($send == true){
							#assign data.
							$data['username']	=	$user;
							$data['email']		=	$email;
							$data['inform']		=	"A new password has been sent to your email!";
						}else{
							#assign data.
							$data['username']	=	$user;
							$data['email']		=	$email;
							$data['error']		=	"Can't connect to your email. Please enter your right email";
						}
						
					}
				}else {
					#assign data.
					$data['username']	=	$user;
					$data['email']		=	$email;
					$data['error']		=	"Username or Email is incorrect!";
				}
			} 
		}
		$data['tpl_file']	=	"";
		$this->load->view('admin/forgot', $data);
	}
	
	
	
	function send_email($acc_id, $newpass){
		
		/* $mail			=   $this->auth_model->get_template_email('21');
		$tpl1 = '<div style="float:left;width:100%;border:1px solid #ccc;margin:3px;padding:3px"><p>Applicant [num]:</p><p style="margin-left:10px">- FULL NAME ON PASSPORT: [ap_name]</p><p style="margin-left:10px">- PASSPORT NUMBER: [ap_num]</p><p style="margin-left:10px">- DATE OF BIRTH: [ap_birth]</p><p style="margin-left:10px">- NATIONALITY: [ap_national]</p><p style="margin-left:10px">- GENDER: [ap_sex]</p></div>';
		/*$tpl	= '<br/><p style="color:#008080;font-size: 16px;font-weigh:bold;">Applicant [num]</p>
			<table border="0" cellpadding="1" cellspacing="1" style="width: 500px; height: 126px;">
		<tr style="color:#008080;font-size: 14px;"><td>Full name:</td><td>&nbsp;</td><td>[ap_name]</td></tr>
		<tr style="color:#008080;font-size: 14px;"><td>Passport Number:</td><td>&nbsp;</td><td>[ap_num]</td></tr>
		<tr style="color:#008080;font-size: 14px;"><td>Date Of Birth:</td><td>&nbsp;</td><td>[ap_birth]</td></tr>
		<tr style="color:#008080;font-size: 14px;"><td>Nationality:</td><td>&nbsp;</td><td>[ap_national]</td></tr>
		<tr style="color:#008080;font-size: 14px;"><td>Gender:</td><td>&nbsp;</td><td>[ap_sex]</td></tr>
		<tr style="color:#008080;font-size: 14px;"><td>Passport Expiration Date:</td><td>&nbsp;</td><td>[ap_exp]</td></tr>';
		$txt_appli = '';
		$num = 1;
		foreach ($account_info as $info){
			$applican = $tpl1;
			$applican = str_replace('[num]',$num,$applican);
			$applican = str_replace('[ap_name]',$info->full_name,$applican);
			$applican = str_replace('[ap_num]' ,$info->passport,$applican);
			$applican = str_replace('[ap_birth]',$info->birth_date,$applican);
			$applican = str_replace('[ap_national]',$info->nationality,$applican);
			$applican = str_replace('[ap_sex]',$info->gender,$applican);
			$num++;
			$txt_appli = $txt_appli.$applican;
		};
	 	*/
		#get user info.
		$account_info	=	$this->auth_model->get_account_info($acc_id);
	
		#config send email.	
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_user'] = 'support@govietnamvisa.com';
		$config['smtp_pass'] = 'del_997878778';
	
		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
	
	
		$this->email->from('incredibletran@yahoo.com', 'Tonytran.com');
		$this->email->to($account_info['email']);
		$this->email->cc('incredibletran@gmail.com');
		$this->email->bcc('incredibletran@hot.com');
		$this->email->subject('Here is a subject'.$acc_id);
		$this->email->message('Here is a new password to sign in: '.$newpass);
	
		if($this->email->send()){
			return true;
		}else {
			return false;
		}
	}
	
	


}

/*-----------------------------------------------End--------------------------------------------------*/