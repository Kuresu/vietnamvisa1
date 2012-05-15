<?php 
	# question
	$route['home_admin/question']							=	"question/admin/question_admin/index";
	
	$route['home_admin/question/([0-9\-]+)']				=	"question/admin/question_admin/index/$1";
	
	$route['home_admin/add-new-question']					=	"question/admin/question_admin/add";
	
	$route['home_admin/edit-question/(:num)']				=	"question/admin/question_admin/edit/$1";
	
	$route['home_admin/question/change-status']				=	"question/admin/question_admin/change_status";

	$route['home_admin/question/do-action']					=	"question/admin/question_admin/do_action";
	
	$route['home_admin/delete-question/(:num)']				=	"question/admin/question_admin/delete/$1";
	
	$route['home_admin/question/change-order']				=	"question/admin/question_admin/change_order";
	
	$route['home_admin/question/search-results']			=	"question/admin/question_admin/search";
	
	# question categories.
	
	$route['home_admin/question-category']					=	"question/admin/qcate_admin/index";
	
	$route['home_admin/add-new-qcate']						=	"question/admin/qcate_admin/add";
	
	$route['home_admin/edit-qcate/(:num)']					=	"question/admin/qcate_admin/edit/$1";
	
	$route['home_admin/delete-qcate/(:num)']				=	"question/admin/qcate_admin/delete/$1";
	
	$route['home_admin/qcate/change-status']				=	"question/admin/qcate_admin/change_status";
	
	$route['home_admin/qcate/change-order']					=	"question/admin/qcate_admin/change_order";
	
	$route['home_admin/qcate/do-action']					=	"question/admin/qcate_admin/do_action";
	