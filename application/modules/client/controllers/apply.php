<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apply extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('link'));

	}

	
	function apply_online(){
		$this->load->view('apply_tpl');
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */