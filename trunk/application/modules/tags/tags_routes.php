<?php 

	$route[ADMIN_SIDE.'/tags']							=	"tags/admin/tags_admin/index";
	
	$route[ADMIN_SIDE.'/tags/([0-9\-]+)']				=	"tags/admin/tags_admin/index/$1";
	
	$route[ADMIN_SIDE.'/add-new-tags']					=	"tags/admin/tags_admin/add";
	
	$route[ADMIN_SIDE.'/edit-tags/(:num)']				=	"tags/admin/tags_admin/edit/$1";
	
	$route[ADMIN_SIDE.'/tags/change-status']				=	"tags/admin/tags_admin/change_status";

	$route[ADMIN_SIDE.'/tags/do-action']					=	"tags/admin/tags_admin/do_action";
	
	$route[ADMIN_SIDE.'/delete-tags/(:num)']				=	"tags/admin/tags_admin/delete/$1";
	
	$route[ADMIN_SIDE.'/tags/change-order']				=	"tags/admin/tags_admin/change_order";
	
	$route[ADMIN_SIDE.'/tags/search-results']			=	"tags/admin/tags_admin/search";