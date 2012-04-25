<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	
	}

	function index(){exit('no');
		$this->load->view('welcome_message');
	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/auth.php */