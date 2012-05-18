<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ---------------------------------------------------------------
 * Author  : Anthony Tran
 * Email   : Incredibletran@gmail.com - Incredibletran@hotmail.com
 * Version : 1.0
 * ---------------------------------------------------------------
*/
class Adminstrators_model extends CI_Model{
	
	var	$table_admin		=	"admin";		
	
	function __construct(){
        parent::__construct(); 
    }
    
	
    
    function get_all_acc(){
    	$acc_list	=	$this->db->select()
    							 ->order_by('time','DESC')
    							 ->get($this->table_admin)
    							 ->result();
    	if(!empty($acc_list)){
    		return $acc_list;
    	}
    	return false;
    }
    
    
    
    function get_acc_list($perpage = 'all', $offset = 0){
    	if($perpage!='all') {
    		$this->db->limit($perpage, $offset);
    	}
    	$this->db->order_by('id', 'DESC');
    	$query	= $this->db->get($this->table_admin);
    	$result	= $query->result();
    	
    	if(!empty($result)){
    		return $result;
    	}
    	return false;
    }
    
    
    
    function delete($acc_id){
    	return $this->db->where('id', $acc_id)->delete($this->table_admin);
    }
    
    
    function edit_adminstrator($acc_id, $info = array()){
    	if($info['password'] == ""){unset($info['password']);}
    	return $this->db->where('id', $acc_id)
    				 	->update($this->table_admin, $info);
    }
    
    
    function change_status($acc_id, $info = array()){
    	return $this->db->where('id', $acc_id)
    					->update($this->table_admin, $info);
    }
    
    
    function get_match($id){
    	$res	=	$this->db->select()
    						 ->where('id', $id)
    						 ->get($this->table_admin)
    						 ->row();
    	if(!empty($res)){
    		return $res;
    	}
    	return false;
    	
    }
    
    
    function check_exist($username){
    	$res	=	$this->db->select()
    						 ->where('username', $username)
    						 ->get($this->table_admin)
    						 ->row_array();
    	if(!empty($res)){
    		return true;
    	}
    	return false;
    }
    
    function check_exist_edit($id, $username){
    	$res	=	$this->db->select()
    						 ->where('id !=', $id)
					    	 ->where('username', $username)
					    	 ->get($this->table_admin)
					    	 ->row_array();
    	if(!empty($res)){
    		return true;
    	}
    	return false;
    }
    
    
    function add_adminstrator($info = array()){
    	return $this->db->insert($this->table_admin, $info);
    }
    
    
    function count_active(){
    	return $this->db->where('active', 'yes')->count_all_results($this->table_admin);
    }
    
    
    function update_many($id_list, $info = array()){
    	return $this->db->where_in('id', $id_list)
    					->set($info)
    					->update($this->table_admin);
    }
    
    function delete_many($id_list){
    	return $this->db->where_in('id', $id_list)
    					->delete($this->table_admin);
    	
    }



}

/*-------------------------------------------End--------------------------------------------*/