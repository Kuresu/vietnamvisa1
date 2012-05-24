<?php 
	# email
	$route[ADMIN_SIDE.'/email']							=	"email/admin/email_admin/index";
	
	$route[ADMIN_SIDE.'/email/([0-9\-]+)']				=	"email/admin/email_admin/index/$1";
	
	$route[ADMIN_SIDE.'/edit-email/(:num)']				=	"email/admin/email_admin/edit/$1";
	
	$route[ADMIN_SIDE.'/add-new-email']					=	"email/admin/email_admin/add";
	
	$route[ADMIN_SIDE.'/email/change-status']			=	"email/admin/email_admin/change_status";

	$route[ADMIN_SIDE.'/email/do-action']				=	"email/admin/email_admin/do_action";
	
	$route[ADMIN_SIDE.'/delete-email/(:num)']			=	"email/admin/email_admin/delete/$1";
	
	$route[ADMIN_SIDE.'/email/search-results']			=	"email/admin/email_admin/search";
	
	$route[ADMIN_SIDE.'/email/load-row/(:any)']			=	"email/admin/email_admin/load_row/$1";
	
	