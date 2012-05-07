<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_model extends CI_Model{
	
	var	$table		=	"page";
	var $table_cate	=	"category";		
	
	function __construct(){
        parent::__construct(); 
    }
    
    
    function get_all_page(){
    	$cate	=	$this->db->select()
    					 	 ->get($this->table)
    					 	 ->result();
    	if(!empty($cate)){
    		return $cate;
    	}
    	return false;
    }
    
    
    function get_page_list($perpage = 'all', $offset){
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
    
    
    function add_page($info = array()){
    	return $this->db->insert($this->table, $info);
    }
    
    
    function edit_page($page_id, $info = array()){
    	return $this->db->where('id', $page_id)
    					->update($this->table, $info);
    }
    
    
    function count_active(){
    	return $this->db->where('active', 'yes')->count_all_results($this->table);
    }
    
    
    function change_status($page_id, $info = array()){
    	return $this->db->where('id', $page_id)
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
    
    
    function delete($page_id){
    	return $this->db->where('id', $page_id)->delete($this->table);
    }
    
    function update_order($id, $info = array()){
    	return $this->db->where('id', $id)->update($this->table, $info);
    }
    
    
    function check_exist_edit($page_id, $name){
    	$res	=	$this->db->select()
					    	 ->where('id !=', $page_id)
					    	 ->where('name', $name)
					    	 ->get($this->table)
					    	 ->row_array();
    	if(!empty($res)){
    		return true;
    	}
    	return false;
    }
    
    function check_order_exist_edit($page_id, $order){
    	$res	=	$this->db->select()
					    	 ->where('id !=', $page_id)
					    	 ->where('order', $order)
					    	 ->get($this->table)
					    	 ->row_array();
    	if(!empty($res)){
    		return true;
    	}
    	return false;
    }
    
    
    function get_search_list($keyword = "Keyword", $cate_id = '|all|'){
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
    
    function get_search_list_by_category($cate_id = '|all|'){
    	$this->db->select();
    	if($cate_id != '|all|'){
    		$this->db->like('cate_id', $cate_id);
    	}
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
    						 ->like('name', $keyword)
    						 ->or_like('name_ascii', $keyword)
    						 ->get($this->table)
    						 ->result();
    	if(!empty($res)){
    		return $res;
    	}
    	return false;
    }
    
   
    
    
    # use for add cate name to a page,
    function get_cate_match($cate_id = array()){
    	$cate	=	$this->db->select()
    						 ->where_in('id', $cate_id)
    						 ->get($this->table_cate)
    						 ->result();
    	return $cate;
    }
    
    
    #get cate tree
    function check_is_parent($id){
    	$check = $this->db->where('parent_id', $id)
			    		  ->get($this->table_cate)
			    		  ->row_array();
    	return $check;
    }
    
    
    
    function get_tree_cate() {
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
	    				  ->get($this->table_cate);
	    
	    #if item who have parent_id == 0 exist, it will be assign into an array() of many objects as name $list[] (Parents)
	    if($query->row_array()) {
	    	$results = $query->result();		# Get all objects those belong to their parent.
		    foreach($results as $xyz) {			# Loop through all objects.
		    $xyz->level = $level;				# Add one more property to each object.
		    $list[] 	= $xyz;					# Assign each object to array $list[]('cause $xyz are objects)
		    $list 		= $this->get_children($list, $xyz->id, $level+1);	# Then at last, get the list of Childrens
		    }
	    } else {
	    	return $list;
	    }
    	return $list;
    }
    
    
    
    
    
}
//End Page_model