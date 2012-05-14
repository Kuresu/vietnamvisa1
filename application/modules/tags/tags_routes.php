<?php 

	$route['home_admin/tags']							=	"tags/admin/tags_admin/index";
	
	$route['home_admin/tags/([0-9\-]+)']				=	"tags/admin/tags_admin/index/$1";
	
	$route['home_admin/add-new-tags']					=	"tags/admin/tags_admin/add";
	
	$route['home_admin/edit-tags/(:num)']				=	"tags/admin/tags_admin/edit/$1";
	
	$route['home_admin/tags/change-status']				=	"tags/admin/tags_admin/change_status";

	$route['home_admin/tags/do-action']					=	"tags/admin/tags_admin/do_action";
	
	$route['home_admin/delete-tags/(:num)']				=	"tags/admin/tags_admin/delete/$1";
	
	$route['home_admin/tags/change-order']				=	"tags/admin/tags_admin/change_order";
	
	$route['home_admin/tags/search-results']			=	"tags/admin/tags_admin/search";