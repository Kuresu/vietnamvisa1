<?php 
	# customers
	$route[ADMIN_SIDE.'/new-customers']						=	"customers/admin/customers_admin/index";
	
	$route[ADMIN_SIDE.'/new-customers/([0-9\-]+)']			=	"customers/admin/customers_admin/index/$1";
	
	$route[ADMIN_SIDE.'/processing-customers']				=	"customers/admin/customers_admin/processing";
	
	$route[ADMIN_SIDE.'/processing-customers/([0-9\-]+)']	=	"customers/admin/customers_admin/processing/$1";
	
	$route[ADMIN_SIDE.'/finish-customers']					=	"customers/admin/customers_admin/finish";
	
	$route[ADMIN_SIDE.'/finish-customers/([0-9\-]+)']		=	"customers/admin/customers_admin/finish/$1";
	
	$route[ADMIN_SIDE.'/refund-customers']					=	"customers/admin/customers_admin/refund";
	
	$route[ADMIN_SIDE.'/refund-customers/([0-9\-]+)']		=	"customers/admin/customers_admin/refund/$1";
	
	$route[ADMIN_SIDE.'/deleted-customers']					=	"customers/admin/customers_admin/junk";
	
	$route[ADMIN_SIDE.'/deleted-customers/([0-9\-]+)']		=	"customers/admin/customers_admin/junk/$1";
	
	$route[ADMIN_SIDE.'/edit-customers/(:num)']				=	"customers/admin/customers_admin/edit/$1";
	
	$route[ADMIN_SIDE.'/applicants-info/(:num)']			=	"customers/admin/customers_admin/applicants/$1";
	
	$route[ADMIN_SIDE.'/customers/change-status']			=	"customers/admin/customers_admin/change_status";

	$route[ADMIN_SIDE.'/customers/do-action']				=	"customers/admin/customers_admin/do_action";
	
	$route[ADMIN_SIDE.'/delete-customers/(:num)']			=	"customers/admin/customers_admin/delete/$1";
	
	$route[ADMIN_SIDE.'/customers/change-order']			=	"customers/admin/customers_admin/change_order";
	
	$route[ADMIN_SIDE.'/customers/search-results']			=	"customers/admin/customers_admin/search";
	
	$route[ADMIN_SIDE.'/customers/load-row/(:any)']			=	"customers/admin/customers_admin/load_row/$1";
	