<?php 

	$route['home_admin/page']							=	"page/admin/page_admin/index";
	
	$route['home_admin/page/([0-9\-]+)']				=	"page/admin/page_admin/index/$1";
	
	$route['home_admin/add-new-page']					=	"page/admin/page_admin/add";
	
	$route['home_admin/edit-page/(:num)']				=	"page/admin/page_admin/edit/$1";
	
	$route['home_admin/page/change-status']				=	"page/admin/page_admin/change_status";

	$route['home_admin/page/do-action']					=	"page/admin/page_admin/do_action";
	
	$route['home_admin/page/delete-page/([0-9\-]+)']	=	"page/admin/page_admin/delete/$1";
	
	$route['home_admin/page/change-order']				=	"page/admin/page_admin/change_order";
	
	$route['home_admin/page/search-results']			=	"page/admin/page_admin/search";