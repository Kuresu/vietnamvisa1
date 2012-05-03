<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model{
	
	var	$table		=	"category";		
	
	function __construct(){
        parent::__construct(); 
    }
    
    
    function get_all_cate(){
    	$cate	=	$this->db->select()
    					 	 ->get($this->table)
    					 	 ->result();
    	if(!empty($cate)){
    		return $cate;
    	}
    	return false;
    }
    
    
    function get_cate_list($perpage = 'all', $offset){
    	$this->db->select();
    	if($perpage != 'all'){
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
    
    
    function delete($cate_id){
    	return $this->db->where('id', $cate_id)->delete($this->table);
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
    
    function check_order_exist($order){
    	$res	=	$this->db->select()
					    	 ->where('order', $order)
					    	 ->get($this->table)
					    	 ->row_array();
    	if(!empty($res)){
    		return true;
    	}
    	return false;
    }
    
    
    function check_exist_edit($cate_id, $name){
    	$res	=	$this->db->select()
    						 ->where('id !=', $cate_id)
    						 ->where('name', $name)
    						 ->get($this->table)
    						 ->row_array();
    	if(!empty($res)){
    		return true;
    	}
    	return false;
    }
    
    function check_order_exist_edit($cate_id, $order){
    	$res	=	$this->db->select()
    						 ->where('id !=', $cate_id)
					    	 ->where('order', $order)
					    	 ->get($this->table)
					    	 ->row_array();
    	if(!empty($res)){
    		return true;
    	}
    	return false;
    }
    
    
    function add_category($info = array()){
    	return $this->db->insert($this->table, $info);
    }
    
    
    function edit_category($cate_id, $info = array() ){
    	return $this->db->where('id', $cate_id)
    					->update($this->table, $info);
    }
    
    
    function change_status($cate_id, $info = array()){
    	return $this->db->where('id', $cate_id)
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
    
    
    function update_order($id, $info = array()){
    	return $this->db->where('id', $id)->update($this->table, $info);
    }
    
    
    function count_active(){
    	return $this->db->where('status', 'yes')->count_all_results($this->table);
    }
    
    
    function get_search_list($keyword){
    	$search	=	$this->db->select()
    						 ->like('name', $keyword)
    						 ->or_like('name_ascii', $keyword)
    						 ->get($this->table)
    						 ->result();
    	if(!empty($search)){
    		return $search;
    	}
    	return false;
    }
    
  
}