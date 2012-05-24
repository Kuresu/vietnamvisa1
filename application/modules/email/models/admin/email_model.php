<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ---------------------------------------------------------------
 * Author  : Anthony Tran
 * Email   : Incredibletran@gmail.com - Incredibletran@hotmail.com
 * Version : 1.0
 * ---------------------------------------------------------------
*/
class Email_model extends CI_Model{
	
	var	$table			=	"email_temp";	
	
	function __construct(){
        parent::__construct(); 
    }
    
    
    function get_all(){
    	$slide	=	$this->db->select()
    					 	 ->get($this->table)
    					 	 ->result();
    	if(!empty($slide)){
    		return $slide;
    	}
    	return false;
    }
    
    
    
    function count_all(){

    	$number	= $this->db->count_all($this->table);
    	if($number > 0){
    		return $number;
    	}
    }
    
    
    
    function get_list( $perpage = 'all', $offset){
    	$this->db->select();

    	if($perpage!='all') {
    		$this->db->limit($perpage, $offset);
    	}
    	$this->db->order_by('id', 'DESC');
    	$query	= $this->db->get($this->table);
    	$result	= $query->result();
    
    	if(!empty($result)){
    		return $result;
    	}
    	return false;
    }
    

    
    function add($info = array()){
    	return $this->db->insert($this->table, $info);
    }
    
    
    
    function check_exist($name){
    	$res	=	$this->db->select()
					    	 ->where('name', $name)
					    	 ->get($this->table)
					    	 ->row_array();
    	if(!empty($res)){
    		return true;
    	}
    	return false;
    }
    
    
    
    function check_subject_exist($subject){
    	$res	=	$this->db->select()
					    	 ->where('subject', $subject)
					    	 ->get($this->table)
					    	 ->row_array();
    	if(!empty($res)){
    		return true;
    	}
    	return false;
    }
    
    
    
    function check_edit_exist($id, $name){
    	$res	=	$this->db->select()
    						 ->where('id !=', $id)
					    	 ->where('name', $name)
					    	 ->get($this->table)
					    	 ->row_array();
    	if(!empty($res)){
    		return true;
    	}
    	return false;
    }
    
    
    
    function check_subject_edit_exist($id, $subject){
    	$res	=	$this->db->select()
    						 ->where('id !=', $id)
					    	 ->where('subject', $subject)
					    	 ->get($this->table)
					    	 ->row_array();
    	if(!empty($res)){
    		return true;
    	}
    	return false;
    }
    

    
    
    function edit($quest_id, $info = array()){
    	return $this->db->where('id', $quest_id)
    					->update($this->table, $info);
    }
    
    
    function count_active(){
    	return $this->db->where('active', 'yes')->count_all_results($this->table);
    }
    

    
    function change_status($id, $info = array()){
    	return $this->db->where('id', $id)
    					->update($this->table, $info);
    }
    
    
    function get_match($id){
    	$res	=	$this->db->select()
    						 ->where('id', $id)
    						 ->get($this->table)
    						 ->row();
    	if(!empty($res)){
    		return $res;
    	}
    	return false;
    
    }
    
    

    
    
    function update_many($id_list, $info = array()){
    	return $this->db->where_in('id', $id_list)
    					->set($info)
    					->update($this->table);
    }
    
    
    function delete_many($id_list){
    	return $this->db->where_in('id', $id_list)
    					->delete($this->table);
    }
    
    
    function delete($id){
    	return $this->db->where('id', $id)->delete($this->table);
    }
    

    
    
    function check_exist_edit($quest_id, $question){
    	$res	=	$this->db->select()
    						 ->where('id !=', $quest_id)
    						 ->where('brief_ascii', $question)
					    	 ->get($this->table)
					    	 ->row_array();
    	if(!empty($res)){
    		return true;
    	}
    	return false;
    }
    


    
}

/*---------------------------------------------End-------------------------------------------*/