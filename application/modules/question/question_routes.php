<?php 
	# question
	$route[ADMIN_SIDE.'/question']							=	"question/admin/question_admin/index";
	
	$route[ADMIN_SIDE.'/question/([0-9\-]+)']				=	"question/admin/question_admin/index/$1";
	
	$route[ADMIN_SIDE.'/add-new-question']					=	"question/admin/question_admin/add";
	
	$route[ADMIN_SIDE.'/edit-question/(:num)']				=	"question/admin/question_admin/edit/$1";
	
	$route[ADMIN_SIDE.'/question/change-status']			=	"question/admin/question_admin/change_status";

	$route[ADMIN_SIDE.'/question/do-action']				=	"question/admin/question_admin/do_action";
	
	$route[ADMIN_SIDE.'/delete-question/(:num)']			=	"question/admin/question_admin/delete/$1";
	
	$route[ADMIN_SIDE.'/question/change-order']				=	"question/admin/question_admin/change_order";
	
	$route[ADMIN_SIDE.'/question/search-results']			=	"question/admin/question_admin/search";
	
	$route[ADMIN_SIDE.'/question/load-row/(:any)']			=	"question/admin/question_admin/load_row/$1";
	
	# question categories.
	
	$route[ADMIN_SIDE.'/question-category']					=	"question/admin/qcate_admin/index";
	
	$route[ADMIN_SIDE.'/add-new-qcate']						=	"question/admin/qcate_admin/add";
	
	$route[ADMIN_SIDE.'/edit-qcate/(:num)']					=	"question/admin/qcate_admin/edit/$1";
	
	$route[ADMIN_SIDE.'/delete-qcate/(:num)']				=	"question/admin/qcate_admin/delete/$1";
	
	$route[ADMIN_SIDE.'/qcate/change-status']				=	"question/admin/qcate_admin/change_status";
	
	$route[ADMIN_SIDE.'/qcate/change-order']				=	"question/admin/qcate_admin/change_order";
	
	$route['home_admin/qcate/do-action']					=	"question/admin/qcate_admin/do_action";
	
	$route['home_admin/qcate/load-row/(:any)']				=	"question/admin/qcate_admin/load_row/$1";
	