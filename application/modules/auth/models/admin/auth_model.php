<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model{
	
	var	$table				=	"admin";		
	
	function __construct(){
        parent::__construct(); 
    }
	
	
	function check_user($username, $password){
		$res	=	$this->db->where('username', $username)
							 ->where('password', $password)
							 ->where('active', 'yes')
							 ->get($this->table)
							 ->result_array();
		if(count($res) >0){
			return $res;
		} else {
			return false;
		}
	}
	
	
	function forgot_pass($user, $email){
		$res	=	$this->db->where('username', $user)
							 ->where('email', $email)
							 ->get($this->table)
							 ->row_array();
		if(!empty($res)){
			return $res;
		}else{
			return false;
		}
	}
	
}
/* End of file auth_model.php */
/* Location: ./application/models/admin/auth_model.php */