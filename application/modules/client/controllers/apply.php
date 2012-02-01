<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apply extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('link'));

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
		$this->load->view('step_1');
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
		echo "<p>".$type_id ."</p>";
	}
	
	function change_number(){
		$number_id	=	$_POST['number_id'];
		echo "<p>".$number_id ."</p>";
		
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */