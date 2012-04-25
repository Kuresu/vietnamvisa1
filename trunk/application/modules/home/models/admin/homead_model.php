<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homead_model extends CI_Model{
	
	var	$table_admin		=	"admin";		
	
	function __construct(){
        parent::__construct(); 
    }
    
    
    
    function change_pass($acc_id, $info = array()){
    	#unset info.
    	unset($info['fullname']);
    	unset($info['username']);
    	unset($info['email']);
    	unset($info['active']);
    	unset($info['group']);
    	
    	$this->db->where('id', $acc_id)->update($this->table_admin, $info);
    }
    
    
    
    function check_match_pass($acc_name, $pass){
    	$check	=	$this->db->select()
    						 ->where('username', $acc_name)
    						 ->where('password', $pass)
    						 ->get($this->table_admin)
    						 ->row_array();
    	if(!empty($check)){
    		return $check;
    	}
    	return false;
    }
    

}

//End Homead_model