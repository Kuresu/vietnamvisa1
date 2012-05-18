<?php 

	$route[ADMIN_SIDE.'/category']					=	"category/admin/category_admin/index";
	
	$route[ADMIN_SIDE.'/category/([0-9\-]+)']		=	"category/admin/category_admin/index/$1";
	
	$route[ADMIN_SIDE.'/add-new-category']			=	"category/admin/category_admin/add";
	
	$route[ADMIN_SIDE.'/edit-category/(:num)']		=	"category/admin/category_admin/edit/$1";
	
	$route[ADMIN_SIDE.'/delete-category/([0-9\-]+)']=	"category/admin/category_admin/delete/$1";
	
	$route[ADMIN_SIDE.'/category/change-status']	=	"category/admin/category_admin/change_status";
	
	$route[ADMIN_SIDE.'/category/load-row/(:any)']	=	"category/admin/category_admin/load_row/$1";
	
	$route[ADMIN_SIDE.'/category/do-action']		=	"category/admin/category_admin/do_action";
	
	$route[ADMIN_SIDE.'/category/change-order']		=	"category/admin/category_admin/change_order";

	$route[ADMIN_SIDE.'/category/search-results']	=	"category/admin/category_admin/search";
	
