<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apply_model extends CI_Model{
	
	var	$table				=	"prices";
	var $table_country		=	"country";
	
	function __construct(){
        parent::__construct(); 
    }
	
	
	function get_price($type_visa){
		$option					=	$this->db->where('type_visa', $type_visa)
											 ->where('status', 'active')
							 		 		 ->get($this->table)
							 	 			 ->row_array();
		if(!empty($option)){
			return $option;
		}
		return false;
	}
	
	
	function get_type_of_visa(){
		$type	=	$this->db->where('status','active' )
							 ->get($this->table)
							 ->result();
		if(!empty($type)){
			return $type;
		}
		return false;
	}
	
	
	function get_country(){
		$country	=	$this->db->select(array('id', 'name'))
								 ->where('active', 'yes')
								 ->get($this->table_country)
								 ->result();
		if(!empty($country)){
			return	$country;
		}
		return false;
	}
	
}

/* End of file apply_model.php */
/* Location: ./application/models/apply_model.php */