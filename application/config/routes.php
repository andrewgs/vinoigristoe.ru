<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "users_interface";
$route['404_override'] = '';

/***************************************************	USERS INTRERFACE	***********************************************/
$route[''] 			= "users_interface/index";
$route['admin'] 	= "users_interface/admin_login";
$route['production']= "users_interface/production";
$route['company']	= "users_interface/company";
$route['where']		= "users_interface/where";
$route['tourism']	= "users_interface/tourism";
$route['contacts']	= "users_interface/contacts";
$route['news']		= "users_interface/events";

$route['events']	= "users_interface/events";
$route['events/from']	= "users_interface/events";
$route['events/from/:num']= "users_interface/events";

$route['events/viewimage/:num']		= "users_interface/viewimage";
$route['category/viewimage/:num']	= "users_interface/viewimage";

$route['events/:any'] 	= "users_interface/view_events";


/***************************************************	ADMIN INTRERFACE	***********************************************/
$route['admin-panel/actions/logoff']	= "admin_interface/admin_logoff";

$route['admin-panel/actions/control']	= "admin_interface/admin_panel";

$route['admin-panel/actions/events']		= "admin_interface/control_events";
$route['admin-panel/actions/events/from']	= "admin_interface/control_events";
$route['admin-panel/actions/events/from/:num']= "admin_interface/control_events";

$route['admin-panel/actions/products']		= "admin_interface/control_products";
$route['admin-panel/actions/products/from']	= "admin_interface/control_products";
$route['admin-panel/actions/products/from/:num']= "admin_interface/control_products";

$route['admin-panel/actions/products/add']	= "admin_interface/control_add_product";
$route['admin-panel/actions/products/delete/productid/:num']= "admin_interface/control_delete_product";



$route['admin-panel/actions/category']			= "admin_interface/control_category";
$route['admin-panel/actions/category/add']		= "admin_interface/control_add_category";
$route['admin-panel/actions/category/edit/:any']= "admin_interface/control_edit_category";
$route['admin-panel/actions/category/delete/categoryid/:num']= "admin_interface/control_delete_category";

$route['admin-panel/actions/events/add']	= "admin_interface/control_add_events";
$route['admin-panel/actions/events/edit/:any']= "admin_interface/control_edit_events";
$route['admin-panel/actions/events/delete/eventsid/:num']= "admin_interface/control_delete_events";

$route['admin-panel/actions/series/:any/:any']	= "admin_interface/control_edit_series";

$route['admin-panel/actions/cabinet']	= "admin_interface/admin_cabinet";