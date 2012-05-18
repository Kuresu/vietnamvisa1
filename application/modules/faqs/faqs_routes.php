<?php 
	# faqs
	$route['home_admin/faqs']							=	"faqs/admin/faqs_admin/index";
	
	$route['home_admin/faqs/([0-9\-]+)']				=	"faqs/admin/faqs_admin/index/$1";
	
	$route['home_admin/add-new-faqs']					=	"faqs/admin/faqs_admin/add";
	
	$route['home_admin/edit-faqs/(:num)']				=	"faqs/admin/faqs_admin/edit/$1";
	
	$route['home_admin/faqs/change-status']				=	"faqs/admin/faqs_admin/change_status";

	$route['home_admin/faqs/do-action']					=	"faqs/admin/faqs_admin/do_action";
	
	$route['home_admin/delete-faqs/(:num)']				=	"faqs/admin/faqs_admin/delete/$1";
	
	$route['home_admin/faqs/change-order']				=	"faqs/admin/faqs_admin/change_order";
	
	$route['home_admin/faqs/search-results']			=	"faqs/admin/faqs_admin/search";
	
	$route['home_admin/faqs/load-row/(:any)']			=	"faqs/admin/faqs_admin/load_row/$1";
	
	# faqs categories.
	
	$route['home_admin/faqs-category']					=	"faqs/admin/fcate_admin/index";
	
	$route['home_admin/add-new-fcate']					=	"faqs/admin/fcate_admin/add";
	
	$route['home_admin/edit-fcate/(:num)']				=	"faqs/admin/fcate_admin/edit/$1";
	
	$route['home_admin/delete-fcate/(:num)']			=	"faqs/admin/fcate_admin/delete/$1";
	
	$route['home_admin/fcate/change-status']			=	"faqs/admin/fcate_admin/change_status";
	
	$route['home_admin/fcate/change-order']				=	"faqs/admin/fcate_admin/change_order";
	
	$route['home_admin/fcate/do-action']				=	"faqs/admin/fcate_admin/do_action";
	
	$route['home_admin/fcate/load-row/(:any)']			=	"faqs/admin/fcate_admin/load_row/$1";
	