<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model{
	
	var	$table		=	"menu";		
	var $table_page	=	"page";
	
	function __construct(){
        parent::__construct(); 
    }
    
    
    function get_all(){
    	$cate	=	$this->db->select()
    					 	 ->get($this->table)
    					 	 ->result();
    	if(!empty($cate)){
    		return $cate;
    	}
    	return false;
    }
    
    
    function get_menu_filter($filter_parent = -1){
    	$this->db->select();
    	if($filter_parent!=-1) {
    		$this->db->where('parent_id',$filter_parent);
    	}
    	$query	= $this->db->get($this->table);
    	$number	= $query->num_rows();
    	
    	if(!empty($number)){
    		return $number;
    	}
    }
    
    
    function get_menu_list($filter_parent=-1, $perpage = 'all', $offset){
    	$this->db->join('menu as menu2','menu2.id=menu.parent_id','left');
		$this->db->select('menu.*, menu2.name as parent_name');
		if($filter_parent!=-1) {
			$this->db->where('menu.parent_id',$filter_parent);	
		}
		if($perpage!='all') { 
			$this->db->limit($perpage, $offset);	
		}
		$this->db->order_by('id', 'DESC');
		$query	= $this->db->get($this->table);
		$result	= $query->result();
		return $result;
    }
    
    
    
    function delete($menu_id){
    	$list = $this->get_tree_by_parent($menu_id);
    	#delete children
    	foreach($list as $k => $v){
    		$this->db->where('id', $v->id)->delete($this->table);
    	}
    	#delete itself.	
    	$this->db->where('id', $menu_id)->delete($this->table);
    }
    
    
    function get_tree_by_parent($parent_id){
		$children = array();
		$children = $this->get_children($children, $parent_id);
		foreach($children as $item) {
			if($this->check_is_parent($item->id)) {
				$item->is_parent = 1;
			} else {
				$item->is_parent = 0;
			}
		}
		return $children;
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
    
    
    function check_exist_edit($menu_id, $name){
    	$res	=	$this->db->select()
    						 ->where('id !=', $menu_id)
    						 ->where('name', $name)
    						 ->get($this->table)
    						 ->row_array();
    	if(!empty($res)){
    		return true;
    	}
    	return false;
    }
    
    function check_order_exist_edit($menu_id, $order){
    	$res	=	$this->db->select()
    						 ->where('id !=', $menu_id)
					    	 ->where('order', $order)
					    	 ->get($this->table)
					    	 ->row_array();
    	if(!empty($res)){
    		return true;
    	}
    	return false;
    }
    
    
    function add_menu($info = array()){
    	return $this->db->insert($this->table, $info);
    }
    
    
    function edit_category($menu_id, $info = array() ){
    	return $this->db->where('id', $menu_id)
    					->update($this->table, $info);
    }
    
    
    function change_status($menu_id, $info = array()){
    	return $this->db->where('id', $menu_id)
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
    
    
    function get_match_parent($parent_id){
    	$res	=	$this->db->select()
					    	 ->where('id', $parent_id)
					    	 ->get($this->table)
					    	 ->row_array();
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
    
    
    function update_order($id, $info = array()){
    	return $this->db->where('id', $id)->update($this->table, $info);
    }
    
    
    function count_active(){
    	return $this->db->where('active', 'yes')->count_all_results($this->table);
    }
    
    
    
    function check_is_parent($id){
    	$check = $this->db->where('parent_id', $id)
    					  ->get($this->table)
    					  ->row_array();
    	return $check; 
    }
    
    
    
	function get_tree() {
		$parent = 0;
		$children = array();
		$children = $this->get_children($children, $parent);
		foreach($children as $item) {
			if($this->check_is_parent($item->id)) {
				$item->is_parent = 1;
			} else {
				$item->is_parent = 0;
			}
		}
		return $children;
	}
	
	
	
	function get_children($list = array(), $parent = 0, $level = 0) {
		#arrange list.
		$this->db->order_by("parent_id", "ASC");

		#get item those has parent_id == 0 (Grand Parents)
		$query = $this->db->where('parent_id', $parent)
						  ->get($this->table);
		
		#if item who have parent_id == 0 exist, it will be assign into an array() of many objects as name $list[] (Parents)
		if($query->row_array()) {
			$results = $query->result();		# Get all objects those belong to their parent.
			foreach($results as $xyz) {			# Loop through all objects.
				$xyz->level = $level;			# Add one more property to each object.
				$list[] 	= $xyz;				# Assign each object to array $list[].
				$list 		= $this->get_children($list, $xyz->id, $level+1);	# Then at last, get the list of Childrens  
			}
		} else {
			return $list;
		}
		return $list;
	}
    
	
	# For edit function.
	function get_tree_edit($id){
		$papa	=	$this->get_match($id);
		$parent = 0;
		$children = array();
			$children = $this->get_children_edit($children, $parent, $id);
			foreach($children as $item) {
				if($this->check_is_parent($item->id)) {
					$item->is_parent = 1;
				} else {
					$item->is_parent = 0;
				}
			}
			return $children;
	}
	
	
	
	function get_children_edit($list = array(), $parent_id, $id, $level = 0){
		$grand	=	$this->db->select()
							 ->where('id !=', $id)
							 ->where('parent_id', $parent_id)
							 ->get($this->table);
		if($grand->row_array()){ 
			$parents	=	$grand->result();
			foreach ($parents as $babies){
				$babies->level	=	$level;
				$list[]			=	$babies;
				$list			=	$this->get_children_edit($list, $babies->id,$id, $level + 1);
			}
		}else {
			return $list;
		}
		return $list;
	}
	
	
  
}