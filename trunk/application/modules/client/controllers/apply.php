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
			$number_applicant			=	$_POST['number_applicant'];
			$applicant_info				=	array();
			
			$contact_info				=	array();
			$contact_info['fullname']	=	$this->input->post('fullname_contact');
			$contact_info['email']		=	$this->input->post('email_contact');
			$contact_info['phone']		=	$this->input->post('phone_contact');
			$contact_info['purpose']	=	$this->input->post('purpose_arrival'); 

			for ($i = 1; $i <= $number_applicant; $i++){
				#get value from step 2 - form.
				$name								=	'full_name_'.$i;
				$passport_number					=	'passport_number_'.$i;
				$passport_expiration				=	'passport_expiration_'.$i;
				$nationality						=	'nationality_'.$i;
				$birth_date							=	'birth_date_'.$i;
				$gender								=	'gender_'.$i;
				
				#assign data to an array.
				$applicant_info[$i]['full_name']			=	$this->input->post($name);
				$applicant_info[$i]['passport_number']		=	$this->input->post($passport_number);
				$applicant_info[$i]['passport_expiration']	=	$this->input->post($passport_expiration);
				$applicant_info[$i]['nationality']			=	$this->input->post($nationality);
				$applicant_info[$i]['birth_date']			=	$this->input->post($birth_date);
				$applicant_info[$i]['gender']				=	$this->input->post($gender);
			}
			
			redirect('apply/step3', 'refresh');
			echo '<pre>';
			print_r($applicant_info);
			echo '</pre>';
			exit('no');
		}
		#get data.
		$para_step1			=	$this->session->userdata('para');
		$country			=	$this->apply_model->get_country();

		#assign data.
		$data['para_step1']	=	$para_step1;
		$data['country']	=	$country;
		
		$this->load->view('step_2', $data);
	}
	
	
	
	function step3(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			exit('no way');
		}
		
		#get data .
		
		#assign data.
		$data['test']	=	'test';
		$this->load->view('step_3', $data);
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