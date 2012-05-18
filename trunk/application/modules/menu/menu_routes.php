<?php 

	$route[ADMIN_SIDE.'/menu']							=	"menu/admin/menu_admin/index";
	
	$route[ADMIN_SIDE.'/menu/([0-9\-]+)']				=	"menu/admin/menu_admin/index/$1";
	
	$route[ADMIN_SIDE.'/add-new-menu']					=	"menu/admin/menu_admin/add";
	
	$route[ADMIN_SIDE.'/edit-menu/(:num)']				=	"menu/admin/menu_admin/edit/$1";
	
	$route[ADMIN_SIDE.'/menu/change-status']			=	"menu/admin/menu_admin/change_status";

	$route[ADMIN_SIDE.'/menu/do-action']				=	"menu/admin/menu_admin/do_action";
	
	$route[ADMIN_SIDE.'/delete-menu/(:num)']			=	"menu/admin/menu_admin/delete/$1";
	
	$route[ADMIN_SIDE.'/menu/change-order']				=	"menu/admin/menu_admin/change_order";
	
	$route[ADMIN_SIDE.'/menu/search-results']			=	"menu/admin/menu_admin/search";
	
	$route[ADMIN_SIDE.'/menu/load-row/(:any)']			=	"menu/admin/menu_admin/load_row/$1";