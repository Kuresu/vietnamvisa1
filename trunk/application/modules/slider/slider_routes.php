<?php 

	$route['home_admin/slider']							=	"slider/admin/slider_admin/index";
	
	$route['home_admin/slider/([0-9\-]+)']				=	"slider/admin/slider_admin/index/$1";
	
	$route['home_admin/add-new-slider']					=	"slider/admin/slider_admin/add";
	
	$route['home_admin/edit-slider/(:num)']				=	"slider/admin/slider_admin/edit/$1";
	
	$route['home_admin/slider/change-status']			=	"slider/admin/slider_admin/change_status";

	$route['home_admin/slider/do-action']				=	"slider/admin/slider_admin/do_action";
	
	$route['home_admin/delete-slider/(:num)']			=	"slider/admin/slider_admin/delete/$1";
	
	$route['home_admin/slider/change-order']			=	"slider/admin/slider_admin/change_order";
	
	$route['home_admin/slider/search-results']			=	"slider/admin/slider_admin/search";
	
	$route['home_admin/slider/load-row/(:any)']			=	"slider/admin/slider_admin/load_row/$1";