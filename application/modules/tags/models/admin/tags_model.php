<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tags_model extends CI_Model{
	
	var	$table		=	"meta_tags";
	var $table_cate	=	"category";		
	
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
    
    
    function get_tag_list($perpage = 'all', $offset){
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
    
    
    function get_tag_search_list($perpage = 'all', $offset, $keyword){
    	$this->db->select();
    	$this->db->like('page', $keyword);
    	$this->db->like('description', $keyword);
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
					    	 ->where('page', $name)
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
    
    
    function add_tag($info = array()){
    	return $this->db->insert($this->table, $info);
    }
    
    
    function edit_tag($tag_id, $info = array()){
    	return $this->db->where('id', $tag_id)
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
    
    
    
    function delete_many($id_list){
    	return $this->db->where_in('id', $id_list)
    					->delete($this->table);
    }
    
    
    function delete($tag_id){
    	return $this->db->where('id', $tag_id)->delete($this->table);
    }
    

    
    function check_exist_edit($tag_id, $name){
    	$res	=	$this->db->select()
					    	 ->where('id !=', $tag_id)
					    	 ->where('page', $name)
					    	 ->get($this->table)
					    	 ->row_array();
    	if(!empty($res)){
    		return true;
    	}
    	return false;
    }
    
    
    
    function get_search_list($keyword = "Keyword"){
    	$res	=	$this->db->select()
					    	 ->like('page', $keyword)
					    	 ->or_like('description', $keyword)
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