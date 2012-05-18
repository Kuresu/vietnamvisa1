<?php 
	# country
	$route['home_admin/country']						=	"country/admin/country_admin/index";
	
	$route['home_admin/country/([0-9\-]+)']				=	"country/admin/country_admin/index/$1";
	
	$route['home_admin/add-new-country']				=	"country/admin/country_admin/add";
	
	$route['home_admin/edit-country/(:num)']			=	"country/admin/country_admin/edit/$1";
	
	$route['home_admin/country/change-status']			=	"country/admin/country_admin/change_status";

	$route['home_admin/country/do-action']				=	"country/admin/country_admin/do_action";
	
	$route['home_admin/delete-country/(:num)']			=	"country/admin/country_admin/delete/$1";
	
	$route['home_admin/country/change-order']			=	"country/admin/country_admin/change_order";
	
	$route['home_admin/country/search-results']			=	"country/admin/country_admin/search";
	
	$route['home_admin/country/load-row/(:any)']			=	"country/admin/country_admin/load_row/$1";
	
	# embassy
	
	$route['home_admin/embassy']						=	"country/admin/embassy_admin/index";
	
	$route['home_admin/embassy/(:num)']					=	"country/admin/embassy_admin/index/$1";
	
	$route['home_admin/add-new-embassy']					=	"country/admin/embassy_admin/add";
	
	$route['home_admin/edit-embassy/(:num)']				=	"country/admin/embassy_admin/edit/$1";
	
	$route['home_admin/delete-embassy/(:num)']			=	"country/admin/embassy_admin/delete/$1";
	
	$route['home_admin/embassy/change-status']			=	"country/admin/embassy_admin/change_status";
	
	$route['home_admin/embassy/change-order']				=	"country/admin/embassy_admin/change_order";
	
	$route['home_admin/embassy/do-action']				=	"country/admin/embassy_admin/do_action";
	
	$route['home_admin/embassy/search-results']			=	"country/admin/embassy_admin/search";
	
	$route['home_admin/embassy/load-row/(:any)']			=	"country/admin/embassy_admin/load_row/$1";
	