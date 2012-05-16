<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ---------------------------------------------------------------
 * Author  : Anthony Tran
 * Email   : Incredibletran@gmail.com - Incredibletran@hotmail.com
 * Version : 1.0
 * ---------------------------------------------------------------
*/
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
	
	function get_account_info($acc_id){
		$res	=	$this->db->select()
							 ->where('id', $acc_id)
							 ->get($this->table)
							 ->row_array();
		return $res;
	}
	
	
	function set_new_pass($acc_id, $info = array()){
		return $this->db->where('id', $acc_id)->update($this->table, $info);
	}
	
}

/*------------------------------------------End----------------------------------------------------*/