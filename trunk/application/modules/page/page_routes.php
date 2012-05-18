<?php 

	$route[ADMIN_SIDE.'/page']							=	"page/admin/page_admin/index";
	
	$route[ADMIN_SIDE.'/page/([0-9\-]+)']				=	"page/admin/page_admin/index/$1";
	
	$route[ADMIN_SIDE.'/add-new-page']					=	"page/admin/page_admin/add";
	
	$route[ADMIN_SIDE.'/edit-page/(:num)']				=	"page/admin/page_admin/edit/$1";
	
	$route[ADMIN_SIDE.'/page/change-status']			=	"page/admin/page_admin/change_status";

	$route[ADMIN_SIDE.'/page/do-action']				=	"page/admin/page_admin/do_action";
	
	$route[ADMIN_SIDE.'/page/delete-page/([0-9\-]+)']	=	"page/admin/page_admin/delete/$1";
	
	$route[ADMIN_SIDE.'/page/change-order']				=	"page/admin/page_admin/change_order";
	
	$route[ADMIN_SIDE.'/page/search-results']			=	"page/admin/page_admin/search";
	
	$route[ADMIN_SIDE.'/page/load-row/(:any)']			=	"page/admin/page_admin/load_row/$1";