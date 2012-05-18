<?php 

	$route[ADMIN_SIDE.'/slider']						=	"slider/admin/slider_admin/index";
	
	$route[ADMIN_SIDE.'/slider/([0-9\-]+)']				=	"slider/admin/slider_admin/index/$1";
	
	$route[ADMIN_SIDE.'/add-new-slider']				=	"slider/admin/slider_admin/add";
	
	$route[ADMIN_SIDE.'/edit-slider/(:num)']			=	"slider/admin/slider_admin/edit/$1";
	
	$route[ADMIN_SIDE.'/slider/change-status']			=	"slider/admin/slider_admin/change_status";

	$route[ADMIN_SIDE.'/slider/do-action']				=	"slider/admin/slider_admin/do_action";
	
	$route[ADMIN_SIDE.'/delete-slider/(:num)']			=	"slider/admin/slider_admin/delete/$1";
	
	$route[ADMIN_SIDE.'/slider/change-order']			=	"slider/admin/slider_admin/change_order";
	
	$route[ADMIN_SIDE.'/slider/search-results']			=	"slider/admin/slider_admin/search";
	
	$route[ADMIN_SIDE.'/slider/load-row/(:any)']		=	"slider/admin/slider_admin/load_row/$1";