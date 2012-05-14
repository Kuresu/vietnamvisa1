<?php 

	$route['home_admin/menu']							=	"menu/admin/menu_admin/index";
	
	$route['home_admin/menu/([0-9\-]+)']				=	"menu/admin/menu_admin/index/$1";
	
	$route['home_admin/add-new-menu']					=	"menu/admin/menu_admin/add";
	
	$route['home_admin/edit-menu/(:num)']				=	"menu/admin/menu_admin/edit/$1";
	
	$route['home_admin/menu/change-status']				=	"menu/admin/menu_admin/change_status";

	$route['home_admin/menu/do-action']					=	"menu/admin/menu_admin/do_action";
	
	$route['home_admin/delete-menu/(:num)']				=	"menu/admin/menu_admin/delete/$1";
	
	$route['home_admin/menu/change-order']				=	"menu/admin/menu_admin/change_order";
	
	$route['home_admin/menu/search-results']			=	"menu/admin/menu_admin/search";