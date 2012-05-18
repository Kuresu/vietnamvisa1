<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ---------------------------------------------------------------
 * Author  : Anthony Tran
 * Email   : Incredibletran@gmail.com - Incredibletran@hotmail.com
 * Version : 1.0
 * ---------------------------------------------------------------
*/
class Embassy_model extends CI_Model{
	
	var	$table			=	"embassy";
	var $table_country	=	"country";		
	
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
    
    
    function get_embassy_list( $perpage = 'all', $offset){
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
    
    
    function get_country(){
    	$country	=	$this->db->select()
    							 ->order_by('name', 'ASC')
    							 ->get($this->table_country)
    							 ->result();
    	if(!empty($country)){
    		return $country;
    	}
    	return false;
    }
    
    
    function check_exist($address){
    	$res	=	$this->db->select()
					    	 ->where('address', $address)
					    	 ->get($this->table)
					    	 ->row_array();
    	if(!empty($res)){
    		return true;
    	}
    	return false;
    }
    

    
    function add_embassy($info = array()){
    	return $this->db->insert($this->table, $info);
    }
    
    
    function edit_embassy($embassy_id, $info = array()){

    	return $this->db->where('id', $embassy_id)
    					->update($this->table, $info);
    }
    

    
    function count_active(){
    	return $this->db->where('active', 'yes')->count_all_results($this->table);
    }
    
    
    function change_status($embassy_id, $info = array()){
    	return $this->db->where('id', $embassy_id)
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
    
    
    
    
    function delete($embassy_id){
    	return $this->db->where('id', $embassy_id)->delete($this->table);
    }
    
    
    function check_exist_edit($embassy_id, $address){
    	$res	=	$this->db->select()
					    	 ->where('id !=', $embassy_id)
					    	 ->where('address', $address)
					    	 ->get($this->table)
					    	 ->row_array();
    	if(!empty($res)){
    		return true;
    	}
    	return false;
    }
    
    
    
    
    function get_match_country($id_country){
    	$country	=	$this->db->select()
    							 ->where('id', $id_country)
    							 ->get($this->table_country)
    							 ->row_array();
    	if(!empty($country)){
    		return $country;
    	}
    	return false;
    }
    
    
    function get_search_list($keyword){
    	$search	=	$this->db->select()
					    	 ->like('city', $keyword)
					    	 ->or_like('address', $keyword)
					    	 ->or_like('country_name', $keyword)
					    	 ->get($this->table)
					    	 ->result();
    	if(!empty($search)){
    		return $search;
    	}
    	return false;
    }

    
    
}

/*-------------------------------------------------End----------------------------------------------*/