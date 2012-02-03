<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apply extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('link'));
		$this->load->model(array('apply_model'));

	}

	
	function step_1(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$para = array(
							'number_visa'		=>	$this->input->post('number_visa'),
							'type_visa'			=>	$this->input->post('type_visa'),
							'processing_time'	=>	$this->input->post('processing_time')
						 );
			
			$this->session->set_userdata('para', $para);
			redirect('apply/step_2', 'refresh');
		}
		#get type of visa from DB.
		$type_of_visa			=	$this->apply_model->get_type_of_visa();
		
		#assign data.
		$data['type_of_visa']	=	$type_of_visa;
		
		$this->load->view('step_1', $data);
	}
	
	
	function step_2(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			echo 'Date of arrival:  '.$this->input->post('date_arrival').'<br>';
			echo 'Date of exit:  '.$this->input->post('date_exit').'<br>';
			exit('no');
		}
		$para_step1	=	$this->session->userdata('para');
		$data['para_step1']	=	$para_step1;
		//print_r($para['number_visa']);
		//exit('step_2');
		$this->load->view('step_2', $data);
	}
	
	function change_type(){
		$type_id	=	$_POST['type_id'];
		
		
		if($type_id == "1 month single"){
			echo "<p>".$type_id.' entry' ."<br>(30-day stay, only 1 time entry/exit)</p>";
		}
		
		if($type_id == "3 months single"){
			echo "<p>".$type_id.' entry' ."<br>(90-day stay, only 1 time entry/exit)</p>";
		}
		
		if($type_id == "1 month multiple"){
			echo "<p>".$type_id.' entry' ."<br>(30-day stay, multiple entry/exit)</p>";
		}

		if($type_id == "3 months multiple"){
			echo "<p>".$type_id.' entry' ."<br>(90-day stay, multiple entry/exit)</p>";
		}
		
	}
	
	function change_number(){
		$number_id	=	$_POST['number_id'];
		if($number_id >1){
			echo "<p>".$number_id.' Applicants' ."</p>";
		}else {
			echo "<p>".$number_id.' Applicant' ."</p>";
		}
		
		
	}
	
	
	function get_price_ajax(){
		//$services		=	$_POST['service'];
		$number_visa	=	$_POST['number_visa'];
		$type_visa		=	$_POST['type_visa'];
		
		$price			=	$this->apply_model->get_price($number_visa, $type_visa);
		
		echo "$".($price['fee_end']*$price['number_visa']);
		exit();
	}

}

/* End of file apply.php */
/* Location: ./application/controllers/apply.php */