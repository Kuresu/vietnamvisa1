<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ---------------------------------------------------------------
 * Author  : Anthony Tran
 * Email   : Incredibletran@gmail.com - Incredibletran@hotmail.com
 * Version : 1.0
 * ---------------------------------------------------------------
*/
class Testimonials_model extends CI_Model{
	
	var	$table			=	"testimonials";	
	
	function __construct(){
        parent::__construct(); 
    }
    
    
    function get_all(){
    	$testi	=	$this->db->select()
    					 	 ->get($this->table)
    					 	 ->result();
    	if(!empty($testi)){
    		return $testi;
    	}
    	return false;
    } 
    
    
    
    function get_testimonials_list($perpage = 'all', $offset){
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
    
    
    
    function edit_testimonials($testimonials_id, $info = array()){
    	return $this->db->where('id', $testimonials_id)
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
    
    
    
    function get_match_order($order){
    	$res	=	$this->db->where('order', $order)
					    	 ->get($this->table)
					    	 ->row_array();
    	if(count($res)>0){
    		return $res;
    	}
    	return $res;
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
    
    
    function delete($quest_id){
    	return $this->db->where('id', $quest_id)->delete($this->table);
    }
    
    
    function get_search_list($keyword){
    	$search	=	$this->db->select()
					    	 ->like('title', $keyword)
					    	 ->or_like('content', $keyword)
					    	 ->get($this->table)
					    	 ->result();
    	if(!empty($search)){
    		return $search;
    	}
    	return false;
    }
    
    
}

/*---------------------------------------------End-------------------------------------------*/