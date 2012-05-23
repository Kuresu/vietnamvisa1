<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ---------------------------------------------------------------
 * Author  : Anthony Tran
 * Email   : Incredibletran@gmail.com - Incredibletran@hotmail.com
 * Version : 1.0
 * ---------------------------------------------------------------
*/
class Customers_model extends CI_Model{
	
	var	$table			=	"customers";	
	var $table_country	=	"country";
	var $table_apply	=	"apply";
	
	
	function __construct(){
        parent::__construct(); 
    }
    
    
    function get_new_all(){
    	$slide	=	$this->db->select()
    						 ->where('status', 'new')
							 ->count_all_results($this->table);
    	if(!empty($slide)){
    		return $slide;
    	}
    	return false;
    }
    
    
    function get_processing_all(){
    	$slide	=	$this->db->select()
					    	 ->where('status', 'processing')
					    	 ->count_all_results($this->table);
    	if(!empty($slide)){
    		return $slide;
    	}
    	return false;
    }
    
    
    function get_finish_all(){
    	$slide	=	$this->db->select()
					    	 ->where('status', 'finish')
					    	 ->count_all_results($this->table);
    	if(!empty($slide)){
    		return $slide;
    	}
    	return false;
    }
    
    
    function get_refund_all(){
    	$slide	=	$this->db->select()
					    	 ->where('status', 'refund')
					    	 ->count_all_results($this->table);
    	if(!empty($slide)){
    		return $slide;
    	}
    	return false;
    }
    
    
    
    function get_new_filter($filter_parent = -1){
    	$this->db->select();
    	$this->db->where('status', 'new');
    	if($filter_parent!=-1) {
    		$this->db->where('nationality',$filter_parent);
    	}
    	$query	= $this->db->get($this->table);
    	$number	= $query->num_rows();
    	 
    	if(!empty($number)){
    		return $number;
    	}
    }
    
    
    
    function get_finish_filter($filter_parent = -1){
    	$this->db->select();
    	$this->db->where('status', 'finish');
    	if($filter_parent!=-1) {
    		$this->db->where('nationality',$filter_parent);
    	}
    	$query	= $this->db->get($this->table);
    	$number	= $query->num_rows();
    
    	if(!empty($number)){
    		return $number;
    	}
    }
    
    
    
    function get_processing_filter($filter_parent = -1){
    	$this->db->select();
    	$this->db->where('status', 'processing');
    	if($filter_parent!=-1) {
    		$this->db->where('nationality',$filter_parent);
    	}
    	$query	= $this->db->get($this->table);
    	$number	= $query->num_rows();
    
    	if(!empty($number)){
    		return $number;
    	}
    }
    
    
    
    function get_refund_filter($filter_parent = -1){
    	$this->db->select();
    	$this->db->where('status', 'refund');
    	if($filter_parent!=-1) {
    		$this->db->where('nationality',$filter_parent);
    	}
    	$query	= $this->db->get($this->table);
    	$number	= $query->num_rows();
    
    	if(!empty($number)){
    		return $number;
    	}
    }
    
    
    
    function get_junk_filter($filter_parent = -1){
    	$this->db->select();
    	$this->db->where('status', 'delete');
    	if($filter_parent!=-1) {
    		$this->db->where('nationality',$filter_parent);
    	}
    	$query	= $this->db->get($this->table);
    	$number	= $query->num_rows();
    
    	if(!empty($number)){
    		return $number;
    	}
    }
    
    
    
    function get_new_customers_list($filter_parent=-1, $perpage = 'all', $offset){
    	$this->db->select();
    	$this->db->where('status', 'new');
    	if($filter_parent!=-1) {
    		$this->db->where('nationality',$filter_parent);
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
    
    
    function get_processing_customers_list($filter_parent=-1, $perpage = 'all', $offset){
    	$this->db->select();
    	$this->db->where('status', 'processing');
    	if($filter_parent!=-1) {
    		$this->db->where('nationality',$filter_parent);
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
    
    
    
    function get_finish_customers_list($filter_parent=-1, $perpage = 'all', $offset){
    	$this->db->select();
    	$this->db->where('status', 'finish');
    	if($filter_parent!=-1) {
    		$this->db->where('nationality',$filter_parent);
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
    
    
    function get_refund_customers_list($filter_parent=-1, $perpage = 'all', $offset){
    	$this->db->select();
    	$this->db->where('status', 'refund');
    	if($filter_parent!=-1) {
    		$this->db->where('nationality',$filter_parent);
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
    
    
    
    function get_junk_customers_list($filter_parent=-1, $perpage = 'all', $offset){
    	$this->db->select();
    	$this->db->where('status', 'delete');
    	if($filter_parent!=-1) {
    		$this->db->where('nationality',$filter_parent);
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
    
    
    
    function edit_question($quest_id, $info = array()){
    	return $this->db->where('id', $quest_id)
    					->update($this->table, $info);
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
    

    
    function delete($quest_id){
    	return $this->db->where('id', $quest_id)->delete($this->table);
    }
    
    
    
    function get_country(){
    	$country	=	$this->db->select('id, name')
    							 ->where('show_off', 'yes')
    							 ->get($this->table_country)
    							 ->result();
    	if(!empty($country)){
    		return $country;
    	}
    	return false;
    }
    
    
    
    function get_applicants($customer_id){
    	$appl	=	$this->db->select()
    						 ->where('customer_id', $customer_id)
    						 ->get($this->table_apply)
    						 ->result();
    	if(!empty($appl)){
    		return $appl;
    	}
    	return false;
    }
    
    
    
}

/*---------------------------------------------End-------------------------------------------*/