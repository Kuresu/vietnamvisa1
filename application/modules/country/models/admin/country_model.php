<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ---------------------------------------------------------------
 * Author  : Anthony Tran
 * Email   : Incredibletran@gmail.com - Incredibletran@hotmail.com
 * Version : 1.0
 * ---------------------------------------------------------------
*/
class Country_model extends CI_Model{
	
	var	$table			=	"country";
	var $table_cate		=	"category";
	
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
    
    
    function get_allow(){
    	$res	=	$this->db->select('id, name, show_off')
    						 ->where('show_off', 'yes')
    						 ->get($this->table)
    						 ->result();
    	if(!empty($res)){
    		return $res;
    	}
    	return false;
    }
    
    
    function get_not_allow(){
    	$res	=	$this->db->select('id, name, show_off')
					    	 ->where('show_off', 'no')
					    	 ->get($this->table)
					    	 ->result();
    	if(!empty($res)){
    		return $res;
    	}
    	return false;
    }
    
    
    
    function get_menu_filter($filter_continent = -1){
    	$this->db->select();
    	if($filter_continent!=-1) {
    		$this->db->where('continent',$filter_continent);
    	}
    	$query	= $this->db->get($this->table);
    	$number	= $query->num_rows();
    
    	if(!empty($number)){
    		return $number;
    	}
    }
    
    
    
    function get_country_list($filter_continent = -1, $perpage = 'all', $offset){
    	$this->db->select();
    	if($filter_continent!=-1) {
    		$this->db->where('continent',$filter_continent);
    	}
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
    

    
    function add_country($info = array()){
    	return $this->db->insert($this->table, $info);
    }
    
    
    function edit_country($country_id, $info = array()){
    	if($info['flag_icon'] == ""){
    		unset($info['flag_icon']);
    	}
    	
    	return $this->db->where('id', $country_id)
    					->update($this->table, $info);
    }
    
    
    function count_active(){
    	return $this->db->where('active', 'yes')->count_all_results($this->table);
    }
    
    
    function change_status($slider_id, $info = array()){
    	return $this->db->where('id', $slider_id)
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
    
    
    function delete($slide_id){
    	return $this->db->where('id', $slide_id)->delete($this->table);
    }
    
    function update_order($id, $info = array()){
    	return $this->db->where('id', $id)->update($this->table, $info);
    }
    
    
    function check_exist_edit($country_id, $name){
    	$res	=	$this->db->select()
    						 ->where('id !=', $country_id)
    						 ->where('name', $name)
					    	 ->get($this->table)
					    	 ->row_array();
    	if(!empty($res)){
    		return true;
    	}
    	return false;
    }
    
    
	
    function get_fcate(){
    	$fcate	=	$this->db->select()
    						 ->order_by('order', 'DESC')
    						 ->get($this->table_cate)
    						 ->result();
    	if(!empty($fcate)){
    		return $fcate;
    	}
    	return false;
    }
    
    
    function get_match_fcate($cate_id){
    	$fcate	=	$this->db->select()
    						 ->where('id', $cate_id)
    						 ->order_by('order', 'DESC')
    						 ->get($this->table_cate)
    						 ->row();
    	if(!empty($fcate)){
    		return $fcate;
    	}
    	return false;
    }
    
    
    function get_search_list($keyword = "Keyword", $cate_id = 'all'){
    	$key_res	=	$this->get_search_list_by_category($cate_id);
    	if(count($key_res[0]) > 0 && isset($key_res)){
    		if($keyword != 'Keyword'){
    			foreach ($key_res as $k => $v){
    				$check	=	$this->get_search_list_by_keyword($v->id, $keyword);
    			}
    			return $check;
    		}
    		return $key_res;
    	}else {
    		return false;
    	}
    }
    
    function get_search_list_by_category($cate_id = 'all'){
    	$this->db->select();
    	if($cate_id != 'all'){
    		$this->db->where('cate_id', $cate_id);
    	}
    	$this->db->order_by('id', 'DESC');
    	$query	=	$this->db->get($this->table);
    	$res	=	$query->result();
    	if(!empty($res)){
    		return $res;
    	}
    	return false;
    }
    
    function get_search_list_by_keyword($id, $keyword){
    	$res	=	$this->db->select()
    						 ->where('id', $id)
    						 ->like('question', $keyword)
					    	 ->or_like('answers', $keyword)
					    	 ->order_by('id', "DESC")
					    	 ->get($this->table)
					    	 ->result();
    	if(!empty($res)){
    		return $res;
    	}
    	return false;
    }
    
    
}

/*------------------------------------------------End----------------------------------------------*/