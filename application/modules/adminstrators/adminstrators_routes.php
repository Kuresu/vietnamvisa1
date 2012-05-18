<?php 

	$route[ADMIN_SIDE.'/adminstrators-management']				=	"adminstrators/admin/adminstrators_admin/index";
	
	$route[ADMIN_SIDE.'/adminstrators-management/([A-Za-z\-]+)']=	"adminstrators/admin/adminstrators_admin/index";
	
	$route[ADMIN_SIDE.'/adminstrators-management/([0-9]+)']		=	"adminstrators/admin/adminstrators_admin/index/$1";
	
	$route[ADMIN_SIDE.'/add-new-adminstrator']					=	"adminstrators/admin/adminstrators_admin/add";
	
	$route[ADMIN_SIDE.'/edit-adminstrator/(:any)']				=	"adminstrators/admin/adminstrators_admin/edit/$1";
	
	$route[ADMIN_SIDE.'/delete-adminstrator/([0-9]+)']			=	"adminstrators/admin/adminstrators_admin/delete/$1";
	
	$route[ADMIN_SIDE.'/adminstrator/change-status']			=	"adminstrators/admin/adminstrators_admin/change_status";
	
	$route[ADMIN_SIDE.'/adminstrator/load-row/(:any)']			=	"adminstrators/admin/adminstrators_admin/load_row/$1";

	$route[ADMIN_SIDE.'/adminstrator/do-action']				=	"adminstrators/admin/adminstrators_admin/do_action";

