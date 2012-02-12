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
			$contact_info['message']	=	$this->input->post('message'); 

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
			
			//redirect('apply/step3', 'refresh');
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
		$service		=	$_POST['service'];
		$total_service	=	0;
		
		$price			=	$this->apply_model->get_price($type_visa);
		
		$group_prices	=	explode('|', $price['prices']);
		
		switch ($number_visa){
			case 1: 
				$fee_per_each	=	$group_prices[0];
				break;
			case 2:	
				$fee_per_each	=	$group_prices[1];
				break;
			case ($number_visa >=3 && $number_visa <= 5 ):
				$fee_per_each	=	$group_prices[2];
				break;
			case ($number_visa >= 6 && $number_visa <= 9 ):
				$fee_per_each	=	$group_prices[3];
				break;
			case ($number_visa >= 10):
				$fee_per_each	=	$group_prices[4];
				break;				
		}
		
		if($service	==	'urgent'){
			$total_service		=	$number_visa * $price['urgent_service'];
		}elseif ($service	==	'super_urgent'){
			die('---');
		}
		echo "$".($fee_per_each * $number_visa + $total_service );
	}
	
	
	
	function validate_date_exit_ceiling(){
		#get data form form.
		$date_arrival			=	$_POST['date_arrival'];
		$type_of_visa			=	$_POST['type_of_visa'];
		
		#get detail of arrival date includes date, month, year.
		$validate_date_exit		=	explode('/', $date_arrival);
		$date_arrival			=	$validate_date_exit[1];
		$month_arrival			=	$validate_date_exit[0];
		$year_arrival			=	$validate_date_exit[2];

		
		#validate date of exit.
		if($type_of_visa == '1 month single' || $type_of_visa == '1 month multiple'){
			if($month_arrival == 12){
				$date_exit		=	$date_arrival;
				$month_exit		=	1;
				$year_exit		=	$year_arrival + 1;
			}else {
				$date_exit		=	$date_arrival;
				$month_exit		=	$month_arrival + 1;
				$year_exit		=	$year_arrival;
			}
		}
		
		if($type_of_visa == '3 months single' || $type_of_visa == '3 months multiple'){
			$date_exit			=	$date_arrival;
			switch ($month_arrival){
				case 10:
					$month_exit	=	1;
					$year_exit	=	$year_arrival + 1;
					break;
				case 11:
					$month_exit	=	2;
					$year_exit	=	$year_arrival + 1;
					break;
				case 12:
					$month_exit	=	3;
					$year_exit	=	$year_arrival + 1;
					break;
				default:
					$month_exit	=	$month_arrival + 3;
					$year_exit	=	$year_arrival;
					break;
			}
		}
		
		echo "<input type='hidden' class='validate[required] text-input datepicker validate[dateRange[grp2]]' id='date_exit2' value='".$month_exit.'/'.$date_exit.'/'.$year_exit."' />";
		
	}

	
	
	
	function validate_date_exit_floor(){
		#get data form form.
		$date_arrival		=	$_POST['date_arrival'];
	
		#get detail of arrival date includes date, month, year.
		$validate_date_exit		=	explode('/', $date_arrival);
		$date_arrival			=	$validate_date_exit[1];
		$month_arrival			=	$validate_date_exit[0];
		$year_arrival			=	$validate_date_exit[2];
		
		echo "<input type='hidden' class='validate[required] text-input datepicker validate[dateRange[grp3]]' id='date_3' value='".$month_arrival.'/'.$date_arrival.'/'.$year_arrival."'/>";
	}
	
	
	
	function validate_passport_expiration_1(){
		#get data form form.
		$date_arrival		=	$_POST['date_arrival'];
		
		#get detail of arrival date includes date, month, year.
		$validate_date_exit		=	explode('/', $date_arrival);
		$date_arrival			=	$validate_date_exit[1];
		$month_arrival			=	$validate_date_exit[0];
		$year_arrival			=	$validate_date_exit[2];
		
		#validate passport expriation date.
		$date_expire			=	$date_arrival;
		switch ($month_arrival){
			case 7:
				$month_expire	=	1;
				$year_expire	=	$year_arrival + 1;
				break;
			case 8:
				$month_expire	=	2;
				$year_expire	=	$year_arrival + 1;
				break;
			case 9:
				$month_expire	=	3;
				$year_expire	=	$year_arrival + 1;
				break;
			case 10:
				$month_expire	=	4;
				$year_expire	=	$year_arrival + 1;
				break;
			case 11:
				$month_expire	=	5;
				$year_expire	=	$year_arrival + 1;
				break;
			case 12:
				$month_expire	=	6;
				$year_expire	=	$year_arrival + 1;
				break;
			default:
				$month_expire	=	$month_arrival + 6;
				$year_expire	=	$year_arrival;
				break;
		}
		
		echo "<input type='hidden' class='validate[required] text-input datepicker validate[dateRange[pass_expiration_1]]' id='expiration_pass_1' value='".$month_expire.'/'.$date_expire.'/'.$year_expire."'/>";
	}

	
	
	function validate_passport_expiration_2(){
		#get data form form.
		$date_arrival		=	$_POST['date_arrival'];
		
		#get detail of arrival date includes date, month, year.
		$validate_date_exit		=	explode('/', $date_arrival);
		$date_arrival			=	$validate_date_exit[1];
		$month_arrival			=	$validate_date_exit[0];
		$year_arrival			=	$validate_date_exit[2];
		
		#validate passport expriation date.
		$date_expire			=	$date_arrival;
		switch ($month_arrival){
			case 7:
				$month_expire	=	1;
				$year_expire	=	$year_arrival + 1;
				break;
			case 8:
				$month_expire	=	2;
				$year_expire	=	$year_arrival + 1;
				break;
			case 9:
				$month_expire	=	3;
				$year_expire	=	$year_arrival + 1;
				break;
			case 10:
				$month_expire	=	4;
				$year_expire	=	$year_arrival + 1;
				break;
			case 11:
				$month_expire	=	5;
				$year_expire	=	$year_arrival + 1;
				break;
			case 12:
				$month_expire	=	6;
				$year_expire	=	$year_arrival + 1;
				break;
			default:
				$month_expire	=	$month_arrival + 6;
				$year_expire	=	$year_arrival;
				break;
		}
		
		echo "<input type='hidden' class='validate[required] text-input datepicker validate[dateRange[pass_expiration_2]]' id='expiration_pass_2' value='".$month_expire.'/'.$date_expire.'/'.$year_expire."'/>";
	}
	
	
	
	function validate_passport_expiration_3(){
		#get data form form.
		$date_arrival		=	$_POST['date_arrival'];
	
		#get detail of arrival date includes date, month, year.
		$validate_date_exit		=	explode('/', $date_arrival);
		$date_arrival			=	$validate_date_exit[1];
		$month_arrival			=	$validate_date_exit[0];
		$year_arrival			=	$validate_date_exit[2];
	
		#validate passport expriation date.
		$date_expire			=	$date_arrival;
		switch ($month_arrival){
			case 7:
				$month_expire	=	1;
				$year_expire	=	$year_arrival + 1;
				break;
			case 8:
				$month_expire	=	2;
				$year_expire	=	$year_arrival + 1;
				break;
			case 9:
				$month_expire	=	3;
				$year_expire	=	$year_arrival + 1;
				break;
			case 10:
				$month_expire	=	4;
				$year_expire	=	$year_arrival + 1;
				break;
			case 11:
				$month_expire	=	5;
				$year_expire	=	$year_arrival + 1;
				break;
			case 12:
				$month_expire	=	6;
				$year_expire	=	$year_arrival + 1;
				break;
			default:
				$month_expire	=	$month_arrival + 6;
				$year_expire	=	$year_arrival;
				break;
		}
	
		echo "<input type='hidden' class='validate[required] text-input datepicker validate[dateRange[pass_expiration_3]]' id='expiration_pass_3' value='".$month_expire.'/'.$date_expire.'/'.$year_expire."'/>";
	}
	
	
	
	function validate_passport_expiration_4(){
		#get data form form.
		$date_arrival		=	$_POST['date_arrival'];
		
		#get detail of arrival date includes date, month, year.
		$validate_date_exit		=	explode('/', $date_arrival);
		$date_arrival			=	$validate_date_exit[1];
		$month_arrival			=	$validate_date_exit[0];
		$year_arrival			=	$validate_date_exit[2];
	
		#validate passport expriation date.
		$date_expire			=	$date_arrival;
		switch ($month_arrival){
			case 7:
				$month_expire	=	1;
				$year_expire	=	$year_arrival + 1;
				break;
			case 8:
				$month_expire	=	2;
				$year_expire	=	$year_arrival + 1;
				break;
			case 9:
				$month_expire	=	3;
				$year_expire	=	$year_arrival + 1;
				break;
			case 10:
				$month_expire	=	4;
				$year_expire	=	$year_arrival + 1;
				break;
			case 11:
				$month_expire	=	5;
				$year_expire	=	$year_arrival + 1;
				break;
			case 12:
				$month_expire	=	6;
				$year_expire	=	$year_arrival + 1;
				break;
			default:
				$month_expire	=	$month_arrival + 6;
				$year_expire	=	$year_arrival;
				break;
		}
	
		echo "<input type='hidden' class='validate[required] text-input datepicker validate[dateRange[pass_expiration_4]]' id='expiration_pass_4' value='".$month_expire.'/'.$date_expire.'/'.$year_expire."'/>";
	}


	
	function validate_passport_expiration_5(){
		#get data form form.
		$date_arrival		=	$_POST['date_arrival'];
	
		#get detail of arrival date includes date, month, year.
		$validate_date_exit		=	explode('/', $date_arrival);
		$date_arrival			=	$validate_date_exit[1];
		$month_arrival			=	$validate_date_exit[0];
		$year_arrival			=	$validate_date_exit[2];
		
		#validate passport expriation date.
		$date_expire			=	$date_arrival;
		switch ($month_arrival){
			case 7:
				$month_expire	=	1;
				$year_expire	=	$year_arrival + 1;
				break;
			case 8:
				$month_expire	=	2;
				$year_expire	=	$year_arrival + 1;
				break;
			case 9:
				$month_expire	=	3;
				$year_expire	=	$year_arrival + 1;
				break;
			case 10:
				$month_expire	=	4;
				$year_expire	=	$year_arrival + 1;
				break;
			case 11:
				$month_expire	=	5;
				$year_expire	=	$year_arrival + 1;
				break;
			case 12:
				$month_expire	=	6;
				$year_expire	=	$year_arrival + 1;
				break;
			default:
				$month_expire	=	$month_arrival + 6;
				$year_expire	=	$year_arrival;
				break;
		}
	
		echo "<input type='hidden' class='validate[required] text-input datepicker validate[dateRange[pass_expiration_5]]' id='expiration_pass_5' value='".$month_expire.'/'.$date_expire.'/'.$year_expire."'/>";
	}
	
	
	
	function validate_passport_expiration_6(){
		#get data form form.
		$date_arrival		=	$_POST['date_arrival'];
	
		#get detail of arrival date includes date, month, year.
		$validate_date_exit		=	explode('/', $date_arrival);
		$date_arrival			=	$validate_date_exit[1];
		$month_arrival			=	$validate_date_exit[0];
		$year_arrival			=	$validate_date_exit[2];
		
		#validate passport expriation date.
		$date_expire			=	$date_arrival;
		switch ($month_arrival){
			case 7:
				$month_expire	=	1;
				$year_expire	=	$year_arrival + 1;
				break;
			case 8:
				$month_expire	=	2;
				$year_expire	=	$year_arrival + 1;
				break;
			case 9:
				$month_expire	=	3;
				$year_expire	=	$year_arrival + 1;
				break;
			case 10:
				$month_expire	=	4;
				$year_expire	=	$year_arrival + 1;
				break;
			case 11:
				$month_expire	=	5;
				$year_expire	=	$year_arrival + 1;
				break;
			case 12:
				$month_expire	=	6;
				$year_expire	=	$year_arrival + 1;
				break;
			default:
				$month_expire	=	$month_arrival + 6;
				$year_expire	=	$year_arrival;
				break;
		}
	
		echo "<input type='hidden' class='validate[required] text-input datepicker validate[dateRange[pass_expiration_6]]' id='expiration_pass_6' value='".$month_expire.'/'.$date_expire.'/'.$year_expire."'/>";
	}
	
	
	
	function validate_passport_expiration_7(){
		#get data form form.
		$date_arrival		=	$_POST['date_arrival'];
	
		#get detail of arrival date includes date, month, year.
		$validate_date_exit		=	explode('/', $date_arrival);
		$date_arrival			=	$validate_date_exit[1];
		$month_arrival			=	$validate_date_exit[0];
		$year_arrival			=	$validate_date_exit[2];
	
		#validate passport expriation date.
		$date_expire			=	$date_arrival;
		switch ($month_arrival){
			case 7:
				$month_expire	=	1;
				$year_expire	=	$year_arrival + 1;
				break;
			case 8:
				$month_expire	=	2;
				$year_expire	=	$year_arrival + 1;
				break;
			case 9:
				$month_expire	=	3;
				$year_expire	=	$year_arrival + 1;
				break;
			case 10:
				$month_expire	=	4;
				$year_expire	=	$year_arrival + 1;
				break;
			case 11:
				$month_expire	=	5;
				$year_expire	=	$year_arrival + 1;
				break;
			case 12:
				$month_expire	=	6;
				$year_expire	=	$year_arrival + 1;
				break;
			default:
				$month_expire	=	$month_arrival + 6;
				$year_expire	=	$year_arrival;
				break;
		}
	
		echo "<input type='hidden' class='validate[required] text-input datepicker validate[dateRange[pass_expiration_7]]' id='expiration_pass_7' value='".$month_expire.'/'.$date_expire.'/'.$year_expire."'/>";
	}
	
	
	
	function validate_passport_expiration_8(){
		#get data form form.
		$date_arrival		=	$_POST['date_arrival'];
	
		#get detail of arrival date includes date, month, year.
		$validate_date_exit		=	explode('/', $date_arrival);
		$date_arrival			=	$validate_date_exit[1];
		$month_arrival			=	$validate_date_exit[0];
		$year_arrival			=	$validate_date_exit[2];
	
		#validate passport expriation date.
		$date_expire			=	$date_arrival;
		switch ($month_arrival){
			case 7:
				$month_expire	=	1;
				$year_expire	=	$year_arrival + 1;
				break;
			case 8:
				$month_expire	=	2;
				$year_expire	=	$year_arrival + 1;
				break;
			case 9:
				$month_expire	=	3;
				$year_expire	=	$year_arrival + 1;
				break;
			case 10:
				$month_expire	=	4;
				$year_expire	=	$year_arrival + 1;
				break;
			case 11:
				$month_expire	=	5;
				$year_expire	=	$year_arrival + 1;
				break;
			case 12:
				$month_expire	=	6;
				$year_expire	=	$year_arrival + 1;
				break;
			default:
				$month_expire	=	$month_arrival + 6;
				$year_expire	=	$year_arrival;
				break;
		}
	
		echo "<input type='hidden' class='validate[required] text-input datepicker validate[dateRange[pass_expiration_8]]' id='expiration_pass_8' value='".$month_expire.'/'.$date_expire.'/'.$year_expire."'/>";
	}
	
	
	
	function validate_passport_expiration_9(){
		#get data form form.
		$date_arrival		=	$_POST['date_arrival'];
	
		#get detail of arrival date includes date, month, year.
		$validate_date_exit		=	explode('/', $date_arrival);
		$date_arrival			=	$validate_date_exit[1];
		$month_arrival			=	$validate_date_exit[0];
		$year_arrival			=	$validate_date_exit[2];
		
		#validate passport expriation date.
		$date_expire			=	$date_arrival;
		switch ($month_arrival){
			case 7:
				$month_expire	=	1;
				$year_expire	=	$year_arrival + 1;
				break;
			case 8:
				$month_expire	=	2;
				$year_expire	=	$year_arrival + 1;
				break;
			case 9:
				$month_expire	=	3;
				$year_expire	=	$year_arrival + 1;
				break;
			case 10:
				$month_expire	=	4;
				$year_expire	=	$year_arrival + 1;
				break;
			case 11:
				$month_expire	=	5;
				$year_expire	=	$year_arrival + 1;
				break;
			case 12:
				$month_expire	=	6;
				$year_expire	=	$year_arrival + 1;
				break;
			default:
				$month_expire	=	$month_arrival + 6;
				$year_expire	=	$year_arrival;
				break;
		}
	
		echo "<input type='hidden' class='validate[required] text-input datepicker validate[dateRange[pass_expiration_9]]' id='expiration_pass_9' value='".$month_expire.'/'.$date_expire.'/'.$year_expire."'/>";
	}
	
	
	
	
	function validate_passport_expiration_10(){
		#get data form form.
		$date_arrival		=	$_POST['date_arrival'];
	
		#get detail of arrival date includes date, month, year.
		$validate_date_exit		=	explode('/', $date_arrival);
		$date_arrival			=	$validate_date_exit[1];
		$month_arrival			=	$validate_date_exit[0];
		$year_arrival			=	$validate_date_exit[2];
		
		#validate passport expriation date.
		$date_expire			=	$date_arrival;
		switch ($month_arrival){
			case 7:
				$month_expire	=	1;
				$year_expire	=	$year_arrival + 1;
				break;
			case 8:
				$month_expire	=	2;
				$year_expire	=	$year_arrival + 1;
				break;
			case 9:
				$month_expire	=	3;
				$year_expire	=	$year_arrival + 1;
				break;
			case 10:
				$month_expire	=	4;
				$year_expire	=	$year_arrival + 1;
				break;
			case 11:
				$month_expire	=	5;
				$year_expire	=	$year_arrival + 1;
				break;
			case 12:
				$month_expire	=	6;
				$year_expire	=	$year_arrival + 1;
				break;
			default:
				$month_expire	=	$month_arrival + 6;
				$year_expire	=	$year_arrival;
				break;
		}
	
		echo "<input type='hidden' class='validate[required] text-input datepicker validate[dateRange[pass_expiration_10]]' id='expiration_pass_10' value='".$month_expire.'/'.$date_expire.'/'.$year_expire."'/>";
	}
	
	
	
}

/* End of file apply.php */
/* Location: ./application/controllers/apply.php */