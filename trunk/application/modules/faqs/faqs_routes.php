<?php 
	# faqs
	$route[ADMIN_SIDE.'/faqs']							=	"faqs/admin/faqs_admin/index";
	
	$route[ADMIN_SIDE.'/faqs/([0-9\-]+)']				=	"faqs/admin/faqs_admin/index/$1";
	
	$route[ADMIN_SIDE.'/add-new-faqs']					=	"faqs/admin/faqs_admin/add";
	
	$route[ADMIN_SIDE.'/edit-faqs/(:num)']				=	"faqs/admin/faqs_admin/edit/$1";
	
	$route[ADMIN_SIDE.'/faqs/change-status']			=	"faqs/admin/faqs_admin/change_status";

	$route[ADMIN_SIDE.'/faqs/do-action']				=	"faqs/admin/faqs_admin/do_action";
	
	$route[ADMIN_SIDE.'/delete-faqs/(:num)']			=	"faqs/admin/faqs_admin/delete/$1";
	
	$route[ADMIN_SIDE.'/faqs/change-order']				=	"faqs/admin/faqs_admin/change_order";
	
	$route[ADMIN_SIDE.'/faqs/search-results']			=	"faqs/admin/faqs_admin/search";
	
	$route[ADMIN_SIDE.'/faqs/load-row/(:any)']			=	"faqs/admin/faqs_admin/load_row/$1";
	
	# faqs categories.
	
	$route[ADMIN_SIDE.'/faqs-category']					=	"faqs/admin/fcate_admin/index";
	
	$route[ADMIN_SIDE.'/add-new-fcate']					=	"faqs/admin/fcate_admin/add";
	
	$route[ADMIN_SIDE.'/edit-fcate/(:num)']				=	"faqs/admin/fcate_admin/edit/$1";
	
	$route[ADMIN_SIDE.'/delete-fcate/(:num)']			=	"faqs/admin/fcate_admin/delete/$1";
	
	$route[ADMIN_SIDE.'/fcate/change-status']			=	"faqs/admin/fcate_admin/change_status";
	
	$route[ADMIN_SIDE.'/fcate/change-order']			=	"faqs/admin/fcate_admin/change_order";
	
	$route['home_admin/fcate/do-action']				=	"faqs/admin/fcate_admin/do_action";
	
	$route['home_admin/fcate/load-row/(:any)']			=	"faqs/admin/fcate_admin/load_row/$1";
	