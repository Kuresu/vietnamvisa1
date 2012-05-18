<?php 

	$route['home_admin/adminstrators-management']				=	"adminstrators/admin/adminstrators_admin/index";
	
	$route['home_admin/adminstrators-management/([A-Za-z\-]+)']	=	"adminstrators/admin/adminstrators_admin/index";
	
	$route['home_admin/adminstrators-management/([0-9]+)']		=	"adminstrators/admin/adminstrators_admin/index/$1";
	
	$route['home_admin/add-new-adminstrator']					=	"adminstrators/admin/adminstrators_admin/add";
	
	$route['home_admin/edit-adminstrator/(:any)']				=	"adminstrators/admin/adminstrators_admin/edit/$1";
	
	$route['home_admin/delete-adminstrator/([0-9]+)']			=	"adminstrators/admin/adminstrators_admin/delete/$1";
	
	$route['home_admin/adminstrator/change-status']				=	"adminstrators/admin/adminstrators_admin/change_status";
	
	$route['home_admin/adminstrator/load-row/(:any)']			=	"adminstrators/admin/adminstrators_admin/load_row/$1";

	$route['home_admin/adminstrator/do-action']					=	"adminstrators/admin/adminstrators_admin/do_action";

