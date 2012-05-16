<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ---------------------------------------------------------------
 * Author  : Anthony Tran
 * Email   : Incredibletran@gmail.com - Incredibletran@hotmail.com
 * Version : 1.0
 * ---------------------------------------------------------------
*/
class Question_model extends CI_Model{
	
	var	$table			=	"ans_question";	
	var $table_cate		=	"ans_category";
	var $table_answer	=	"ans_answer";
	
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
    
    
    
    function get_menu_filter($filter_parent = -1){
    	$this->db->select();
    	if($filter_parent!=-1) {
    		$this->db->where('cate_id',$filter_parent);
    	}
    	$query	= $this->db->get($this->table);
    	$number	= $query->num_rows();
    	 
    	if(!empty($number)){
    		return $number;
    	}
    }
    
    
    
    function get_quest_list($filter_parent=-1, $perpage = 'all', $offset){
    	$this->db->select();
    	if($filter_parent!=-1) {
    		$this->db->where('cate_id',$filter_parent);
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
    
    
    
    function get_match_answer($quest_id){
    	$answer	=	$this->db->select()
    						 ->where('id_question', $quest_id)
    						 ->get($this->table_answer)
    						 ->row_array();
    	if(!empty($answer)){
    		return $answer;
    	}
    	return false;
    }
    
    
    
    function update_answer($quest_id, $ans = array()){
    	return $this->db->where('id_question', $quest_id)
    					->update($this->table_answer, $ans);
    }
    
    
    
    function insert_answer($ans = array()){
    	return $this->db->insert($this->table_answer, $ans);
    }
    
    
    
    function check_exist($question){
    	$res	=	$this->db->select()
					    	 ->where('question_ascii', $question)
					    	 ->get($this->table)
					    	 ->row_array();
    	if(!empty($res)){
    		return true;
    	}
    	return false;
    }
    

    
    
    function add_faq($info = array()){
    	return $this->db->insert($this->table, $info);
    }
    
    
    function edit_question($quest_id, $info = array()){
    	return $this->db->where('id', $quest_id)
    					->update($this->table, $info);
    }
    
    
    function count_active(){
    	return $this->db->where('active', 'yes')->count_all_results($this->table);
    }
    
    
    function count_not_answered(){
    	return $this->db->count_all($this->table_answer);
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
    
    
    
    function delete_answer($quest_id){
    	return $this->db->where('id_question', $quest_id)->delete($this->table_answer);
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
    

	
    function get_qcate(){
    	$fcate	=	$this->db->select()
    						 ->order_by('order', 'DESC')
    						 ->get($this->table_cate)
    						 ->result();
    	if(!empty($fcate)){
    		return $fcate;
    	}
    	return false;
    }
    
    
    function get_match_qcate($cate_id){
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
    
}

/*---------------------------------------------End-------------------------------------------*/