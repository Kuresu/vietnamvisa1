<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apply_model extends CI_Model{
	
	var	$table				=	"pricing_group";
	var $table_country		=	"country";
	
	function __construct(){
        parent::__construct(); 
    }
	
	
	function get_price($number_visa, $type_visa){
		$price					=	array();
		$price['number_visa'] 	= $number_visa;
		$option					=	$this->db->where(array('type'=>$type_visa))
							 		 		 ->get($this->table)
							 	 			 ->result();
		if(!empty($option)){
			$price['fee_end']	=	$option[0]->fee;
			return $price;
		}
		return false;
	}
	
	
	function get_type_of_visa(){
		$type	=	$this->db->where('note','online' )
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