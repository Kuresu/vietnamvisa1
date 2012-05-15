<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'controllers/admin_controller'.EXT);
class Question_admin extends Admin_controller {
	
	
	function __construct(){
        parent::__construct(); 
        $this->load->model(array('admin/question_model'));
        $this->load->library(array('session','upload'));
		$this->load->helper(array('link','upload','text'));
    }
    
    
    function index(){
    	
    	#get filter_parent
    	if(isset($_REQUEST['item_parent'])) {
    		$filter_parent	= $_REQUEST['item_parent'];
    		$this->session->set_userdata('filter_question_parent',$filter_parent);
    	} else {
    		if($this->session->userdata('filter_question_parent')) {
    			$filter_parent = $this->session->userdata('filter_question_parent');
    		} else {
    			$filter_parent = '';
    			$this->session->set_userdata('filter_question_parent',$filter_parent);
    		}
    	}
    	
    	#get number item on perpage.
    	if(isset($_REQUEST['perpage'])) {
    		$perpage		= 	$_REQUEST['perpage'];
    		$this->session->set_userdata('quest_perpage',$perpage);
    	} else {
    		if($this->session->userdata('quest_perpage')) {
    			$perpage	= 	$this->session->userdata('quest_perpage');
    		} else {
    			$perpage 	= 	'all';
    			$this->session->set_userdata('quest_perpage',$perpage);
    		}
    	}
    	
    	#get total item in DB.
    	$total_quest				= 	$this->question_model->get_menu_filter($filter_parent);
    	$this->load->library('pagination');
    	$config['total_rows'] 		= 	$total_quest;
    	$config['per_page'] 		= 	$perpage;
    	$config['first_link']		= 	'First';
    	$config['last_link']		= 	'Last';
    	$config['next_link']		= 	'Next »';
    	$config['prev_link']		= 	'« Prev';
    	$config['first_tag_open']	= 	'<span>';
    	$config['first_tag_close']	= 	'</span>';
    	$config['last_tag_open']	= 	'<span>';
    	$config['last_tag_close']	= 	'</span>';
    	$config['num_tag_open']		= 	'<span style="padding:0 2px 0 2px">';
    	$config['num_tag_close']	= 	'</span>';
    	$config['num_links']		= 	4;
    	$config['cur_tag_open']		= 	'<a class="currentpage">';
    	$config['cur_tag_close']	= 	'</a>';
    	$config['base_url']			= 	admin_url().'/question/';
    	$config['uri_segment']		= 	3;
    	$this->pagination->initialize($config);
    	
    	$pagination					= 	$this->pagination->create_links();
    	$offset 					= 	($this->uri->segment(3)=='') ? 0 : $this->uri->segment(3);
    	
    	#get info.
    	$quest_list					= 	$this->question_model->get_quest_list($filter_parent, $perpage, $offset);
    	$qcate_info					=	$this->question_model->get_qcate();
    
	    $delete_question				=	$this->session->userdata('delete_question');
	    $this->session->unset_userdata('delete_question');
	     
	    if(isset($delete_question) && $delete_question == 'delete question'){
	    	$inform	=	'delete question success';
	    }else {
	    	$inform = "";
	    }
    	
	    #assign data.
	    $data['current_filter_parent']	= 	$this->session->userdata('filter_question_parent');
	    $data['qcate_info']				=	$qcate_info;
	    $data['pagination']				=	$pagination;
	    $data['current_perpage']		=	$perpage;
    	$data['quest_list']				=	$quest_list;
    	$data['inform']					=	$inform;
    	$data['act']					=	"question";
    	$data['tpl_file']				=	"admin/index";
    	$this->load->view('admin/admin_layout/index', $data);
    }
    
    
    function add(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST'){
    		$this->form_validation->set_rules('question', 'Question', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('answer', 'Answer', 'required|trim|xss_clean');
    		
    		if($this->form_validation->run() == true){
    			$cate_id	=	$this->input->post('category');		
    			$cate_info	=	$this->question_model->get_match_fcate($cate_id);
    			$info = array(
    			    			 'question'   		=> $this->input->post('question'),
    			    			 'question_ascii'   => ascii_link($this->input->post('question')),
    							 'answers'   		=> $this->input->post('answer'),
    			    			 'active'	 		=> $this->input->post('status'),
    			    			 'order'			=> $this->input->post('order'),
    			    			 'cate_id'			=> $cate_id, 
    							 'cate_name'		=> $cate_info->name,
    						 );
    			
    			if($this->question_model->check_exist(ascii_link($info['question']))) {
    				die('This question is exist!');
    			}elseif ($this->question_model->check_order_exist($info['order'])){
    				die('This order is exist !');
    			}else{
    				$this->question_model->add_faq($info);
    				die('yes');
    			}
    		}else{
    			die(validation_errors());
    		}
    	}
    	#get data.
    	$fcate_info					=	$this->question_model->get_fcate();
    	
    	$data['cate_info']			=	$fcate_info;
    	$this->load->view('admin/add', $data);
    }
    
    
    
    function edit($quest_id = ""){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$this->form_validation->set_rules('brief', 'Question Brief', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('answer_name', 'Answer Name', 'required|trim|xss_clean');
    		$this->form_validation->set_rules('answer', 'Answer', 'required|trim|xss_clean');
    		
    		if($this->form_validation->run() == true){
    			$cate_id	=	$this->input->post('category');
    			$cate_info	=	$this->question_model->get_match_qcate($cate_id);
    			$question	=	$this->input->post('question');
    			$match_ans	=	$this->question_model->get_match_answer($quest_id);
    			$info	= 	array(
    		    			    	'brief'   		=> $this->input->post('brief'),
    		    			    	'brief_ascii'   => ascii_link($this->input->post('brief')),
    		    			    	'active'	 	=> $this->input->post('status'),
    		    			    	'cate_id'		=> $cate_id, 
    		    					'cate_name'		=> $cate_info->name,
    						 	 );
				
    			$ans	=	array(
    								'answer'		=> $this->input->post('answer'),
    								'time'			=> date('Y-m-d H:i:s', time()),
    								'sender'		=> $this->input->post('answer_name'),
    							 );
    			
    			if($this->question_model->check_exist_edit($quest_id, $info['brief'])) {
    				die('This question brief is exist!');
    			}else{
    				#update question.
    				$this->question_model->edit_question($quest_id, $info);
    				
    				#update answer.
    				if($match_ans){
    					$this->question_model->update_answer($quest_id, $ans);
    				}else {
    					$ans['id_question']	=	$quest_id;
    					$this->question_model->insert_answer($ans);
    				}
    				die('yes');
    			}
    		}else{
    			die(validation_errors());
    		}
    	}
    	
    	#get info from DB.
    	$answer_info		=	$this->question_model->get_match_answer($quest_id);
    	$quest_info			=	$this->question_model->get_match($quest_id);
    	$qcate_info			=	$this->question_model->get_qcate();

    	$data['cate_info']	=	$qcate_info;
    	$data['quest_info']	=	$quest_info;
    	$data['answer_info']=	$answer_info;
    	$this->load->view('admin/edit', $data);
    }
    
    
    
    function delete($quest_id){
    	#delete in DB.
    	$this->question_model->delete($quest_id);
    
    	#delete answer.
    	$this->question_model->delete_answer($quest_id);
     
	    $delete	=	"delete question";
	    $this->session->set_userdata('delete_question', $delete);
	    redirect(admin_url('question'),'refresh');
    }
    
    
    
    function change_status(){
    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$id     		= $this->input->post('id');
    		$status 		= $this->input->post('status');
    		 
    		$info			=	array();
    		$info['active']	=	$status;
    		 
    		$this->question_model->change_status($id, $info);
    		die('yes');
    	}
    }
    
    
    function load_row($id = ''){
    
    	$data['question'] = $this->question_model->get_match($id);
    	$this->load->view('admin/row', $data);
    }
    
    
    
    function change_order() {
    	$faq_id 		= 	$this->input->post('faq_id');
    	$faq_order 		= 	$this->input->post('faq_order');
    
    	$faq 			= 	$this->question_model->get_match($faq_id); //cate will be changed order position.
    	$order		 	= 	$this->question_model->get_match_order($faq_order); // Check 'order' exists or not?
    
    	if (count($order) > 0) {
    		$this->question_model->update_order($order['id'], array('order' => $faq->order));
    		$this->question_model->update_order($faq_id, array('order' => $faq_order));
    		 
    	} else {
    		$this->question_model->update_order($faq_id, array('order' => $faq_order));
    	}
    
    	redirect(admin_url('faqs'), 'refresh');
    }
    
    
    function do_action(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    		 
    		$id_list = $this->input->post('id');
    		$action  = $this->input->post('action');
    
    		if($action == 'delete') {
    			//$this->question_model->delete_many($id_list);
    			for ($i = 0 ; $i < count($id_list); $i++){
    				#delete in DB.
			    	$this->question_model->delete($id_list[$i]);
			    
			    	#delete answer.
			    	$this->question_model->delete_answer($id_list[$i]);
    			}
    		}
    		elseif($action == 'suspend') {
    			$this->question_model->update_many($id_list, array('active' => 'no'));
    		}
    		elseif($action == 'active') {
    			$this->question_model->update_many($id_list, array('active' => 'yes'));
    		}
    		 
    		die('yes');
    	}
    }
    
    
    function search(){
    	$keyword					=	$this->input->post('search');
    	$cate_id					=	$this->input->post('category');
    	
    	#get info.
    	$search_list				= 	$this->question_model->get_search_list($keyword, $cate_id);
    	$fcate_info					=	$this->question_model->get_fcate();
    	#assign data.
    	$data['keyword']			=	$keyword;
    	$data['fcate_info']			=	$fcate_info;
    	$data['cate_id']			=	$cate_id;
    	$data['search_list']		=	$search_list;
    	$data['act']				=	"faqs";
    	$data['tpl_file']			=	"admin/search_index";
    	$this->load->view('admin/admin_layout/index', $data);
    }
    
    
    
}
//End Slider_admin