<?php 
	# testimonials
	$route[ADMIN_SIDE.'/testimonials']							=	"testimonials/admin/testimonials_admin/index";
	
	$route[ADMIN_SIDE.'/testimonials/([0-9\-]+)']				=	"testimonials/admin/testimonials_admin/index/$1";
	
	$route[ADMIN_SIDE.'/edit-testimonials/(:num)']				=	"testimonials/admin/testimonials_admin/edit/$1";
	
	$route[ADMIN_SIDE.'/testimonials/change-status']			=	"testimonials/admin/testimonials_admin/change_status";

	$route[ADMIN_SIDE.'/testimonials/do-action']				=	"testimonials/admin/testimonials_admin/do_action";
	
	$route[ADMIN_SIDE.'/delete-testimonials/(:num)']			=	"testimonials/admin/testimonials_admin/delete/$1";
	
	$route[ADMIN_SIDE.'/testimonials/search-results']			=	"testimonials/admin/testimonials_admin/search";
	
	$route[ADMIN_SIDE.'/testimonials/load-row/(:any)']			=	"testimonials/admin/testimonials_admin/load_row/$1";
	
	