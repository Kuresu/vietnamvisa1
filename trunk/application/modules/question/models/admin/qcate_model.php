<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qcate_model extends CI_Model{
	
	var	$table			=	"ans_category";
	var $table_quest	=	"ans_question";
	var $table_answer	=	"ans_answer";
	
	function __construct(){
        parent::__construct(); 
    }
    
    
    function get_all(){
    	$slide	=	$this->db->select()
    						 ->order_by('id', 'DESC')
    					 	 ->get($this->table)
    					 	 ->result();
    	if(!empty($slide)){
    		return $slide;
    	}
    	return false;
    }
    
    
    function get_question_list($qcate_id){
    	$quest_list	=	$this->db->select()
    							 ->where('cate_id', $qcate_id)
    							 ->get($this->table_quest)
    							 ->result();
    	if(!empty($quest_list)){
    		return $quest_list;
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
    
    
    function add_qcate($info = array()){
    	return $this->db->insert($this->table, $info);
    }
    
    
    function edit_qcate($qcate_id, $info = array()){

    	return $this->db->where('id', $qcate_id)
    					->update($this->table, $info);
    }
    
    
    function edit_question_match($qcate_id, $info = array()){
    	return $this->db->where('cate_id', $qcate_id)
    					->update($this->table_quest, $info);
    }
    
    
    function count_active(){
    	return $this->db->where('active', 'yes')->count_all_results($this->table);
    }
    
    
    function change_status($fcate_id, $info = array()){
    	return $this->db->where('id', $fcate_id)
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
    
    
    function delete_many_question($cate_id){
    	return $this->db->where_in('cate_id', $cate_id)
    					->delete($this->table_quest);
    }
    
    
    function delete_answer($quest_id){
    	return $this->db->where('id_question', $quest_id)->delete($this->table_answer);
    }
    
    
    function delete($fcate_id){
    	return $this->db->where('id', $fcate_id)->delete($this->table);
    }
    
    function update_order($id, $info = array()){
    	return $this->db->where('id', $id)->update($this->table, $info);
    }
    
    
    function check_exist_edit($slide_id, $name){
    	$res	=	$this->db->select()
					    	 ->where('id !=', $slide_id)
					    	 ->where('name', $name)
					    	 ->get($this->table)
					    	 ->row_array();
    	if(!empty($res)){
    		return true;
    	}
    	return false;
    }
    
    function check_order_exist_edit($slide_id, $order){
    	$res	=	$this->db->select()
					    	 ->where('id !=', $slide_id)
					    	 ->where('order', $order)
					    	 ->get($this->table)
					    	 ->row_array();
    	if(!empty($res)){
    		return true;
    	}
    	return false;
    }
    

    
    
}
//End Slider_model