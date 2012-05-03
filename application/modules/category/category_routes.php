<?php 

	$route['home_admin/category']					=	"category/admin/category_admin/index";
	
	$route['home_admin/category/([0-9\-]+)']		=	"category/admin/category_admin/index/$1";
	
	$route['home_admin/add-new-category']			=	"category/admin/category_admin/add";
	
	$route['home_admin/edit-category/(:num)']		=	"category/admin/category_admin/edit/$1";
	
	$route['home_admin/delete-category/([0-9\-]+)']	=	"category/admin/category_admin/delete/$1";
	
	$route['home_admin/category/change-status']		=	"category/admin/category_admin/change_status";
	
	$route['home_admin/category/load-row/(:any)']	=	"category/admin/category_admin/load_row/$1";
	
	$route['home_admin/category/do-action']			=	"category/admin/category_admin/do_action";
	
	$route['home_admin/category/change-order']		=	"category/admin/category_admin/change_order";

	$route['home_admin/category/search-results']	=	"category/admin/category_admin/search";
	
