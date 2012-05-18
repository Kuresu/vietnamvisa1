<?php 
	# country
	$route[ADMIN_SIDE.'/country']						=	"country/admin/country_admin/index";
	
	$route[ADMIN_SIDE.'/country/([0-9\-]+)']			=	"country/admin/country_admin/index/$1";
	
	$route[ADMIN_SIDE.'/add-new-country']				=	"country/admin/country_admin/add";
	
	$route[ADMIN_SIDE.'/edit-country/(:num)']			=	"country/admin/country_admin/edit/$1";
	
	$route[ADMIN_SIDE.'/country/change-status']			=	"country/admin/country_admin/change_status";

	$route[ADMIN_SIDE.'/country/do-action']				=	"country/admin/country_admin/do_action";
	
	$route[ADMIN_SIDE.'/delete-country/(:num)']			=	"country/admin/country_admin/delete/$1";
	
	$route[ADMIN_SIDE.'/country/change-order']			=	"country/admin/country_admin/change_order";
	
	$route[ADMIN_SIDE.'/country/search-results']		=	"country/admin/country_admin/search";
	
	$route[ADMIN_SIDE.'/country/load-row/(:any)']		=	"country/admin/country_admin/load_row/$1";
	
	# embassy
	
	$route[ADMIN_SIDE.'/embassy']						=	"country/admin/embassy_admin/index";
	
	$route[ADMIN_SIDE.'/embassy/(:num)']				=	"country/admin/embassy_admin/index/$1";
	
	$route[ADMIN_SIDE.'/add-new-embassy']				=	"country/admin/embassy_admin/add";
	
	$route[ADMIN_SIDE.'/edit-embassy/(:num)']			=	"country/admin/embassy_admin/edit/$1";
	
	$route[ADMIN_SIDE.'/delete-embassy/(:num)']			=	"country/admin/embassy_admin/delete/$1";
	
	$route[ADMIN_SIDE.'/embassy/change-status']			=	"country/admin/embassy_admin/change_status";
	
	$route[ADMIN_SIDE.'/embassy/change-order']			=	"country/admin/embassy_admin/change_order";
	
	$route[ADMIN_SIDE.'/embassy/do-action']				=	"country/admin/embassy_admin/do_action";
	
	$route[ADMIN_SIDE.'/embassy/search-results']		=	"country/admin/embassy_admin/search";
	
	$route[ADMIN_SIDE.'/embassy/load-row/(:any)']		=	"country/admin/embassy_admin/load_row/$1";
	