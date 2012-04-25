<?php 

	$this->load->view('admin/admin_layout/header');
	
	$this->load->view('admin/admin_layout/sidebar');
	
	$this->load->view($tpl_file);
	
	$this->load->view('admin/admin_layout/footer');


?>