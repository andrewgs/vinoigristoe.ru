<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "users_interface";
$route['404_override'] = '';

/***************************************************	USERS INTRERFACE	***********************************************/
$route[''] 			= "users_interface/index";
$route['set-21age'] = "users_interface/set_21age";

$route['change-language/ru'] = "users_interface/change_language";
$route['change-language/en'] = "users_interface/change_language";

$route['admin'] 	= "users_interface/admin_login";
$route['company']	= "users_interface/company";
$route['where']		= "users_interface/where";

$route['where/:any/:any']	= "users_interface/where_filtr";

$route['tradition']	= "users_interface/tradition";
$route['proizvodstvo']	= "users_interface/proizvodstvo";
$route['vinogradniki']	= "users_interface/vinogradniki";
$route['eco']	= "users_interface/eco";
$route['tourism']	= "users_interface/tourism";
$route['contacts']	= "users_interface/contacts";
$route['news']		= "users_interface/events";

$route['events']	= "users_interface/events";
$route['events/from']	= "users_interface/events";
$route['events/from/:num']= "users_interface/events";

$route['production']	= "users_interface/production";
$route['production/from']	= "users_interface/production";
$route['production/from/:num']= "users_interface/production";

$route['production/category/:any/series/:any/product/:any']= "users_interface/product";

$route['production/category/:any/from/:num']= "users_interface/products_by_category";
$route['production/category/:any/from']= "users_interface/products_by_category";
$route['production/category/:any']= "users_interface/products_by_category";

$route['events/viewimage/:num']		= "users_interface/viewimage";
$route['category/viewimage/:num']	= "users_interface/viewimage";
$route['product/viewimage/:num']	= "users_interface/viewimage";
$route['medals/viewimage/:num']		= "users_interface/viewimage";
$route['quote/viewimage/:num']		= "users_interface/viewimage";
$route['session-clear']				= "users_interface/session_clear";

$route['events/:any'] 	= "users_interface/view_events";


/***************************************************	ADMIN INTRERFACE	***********************************************/
$route['admin-panel/actions/logoff']	= "admin_interface/admin_logoff";

$route['admin-panel/actions/control']	= "admin_interface/admin_panel";

$route['admin-panel/actions/quote']						= "admin_interface/control_quote";
$route['admin-panel/actions/quote/from']				= "admin_interface/control_quote";
$route['admin-panel/actions/quote/from/:num']			= "admin_interface/control_quote";

$route['admin-panel/actions/quote/add']					= "admin_interface/control_add_quote";
$route['admin-panel/actions/quote/edit/:num']			= "admin_interface/control_edit_quote";
$route['admin-panel/actions/qoute/delete/quoteid/:num']	= "admin_interface/control_delete_quote";

$route['admin-panel/actions/events']		= "admin_interface/control_events";
$route['admin-panel/actions/events/from']	= "admin_interface/control_events";
$route['admin-panel/actions/events/from/:num']= "admin_interface/control_events";

$route['admin-panel/actions/products']		= "admin_interface/control_products";
$route['admin-panel/actions/products/from']	= "admin_interface/control_products";
$route['admin-panel/actions/products/from/:num']= "admin_interface/control_products";

$route['admin-panel/actions/products/add']	= "admin_interface/control_add_product";
$route['admin-panel/actions/products/delete/productid/:num']= "admin_interface/control_delete_product";
$route['admin-panel/actions/products/category/:num/series/:num/edit/:any']	= "admin_interface/control_edit_product";

$route['admin-panel/actions/products/category/:num/series/:num/product/:num/medals']	= "admin_interface/control_medals_product";
$route['admin-panel/actions/products/category/:num/series/:num/product/:num/whereby']	= "admin_interface/control_whereby_product";

$route['admin-panel/actions/products/category/:num/series/:num/product/:num/medals/delete/medalid/:num']= "admin_interface/control_delete_medal";
$route['admin-panel/actions/products/category/:num/series/:num/product/:num/whereby/delete/wherebyid/:num']= "admin_interface/control_delete_whereby";

$route['admin-panel/actions/country']= "admin_interface/control_country";
$route['admin-panel/actions/country/edit/:any']= "admin_interface/control_edit_country";
$route['admin-panel/actions/country/delete/countryid/:num']= "admin_interface/control_delete_country";

$route['admin-panel/actions/country/countryid/:num/add-city']= "admin_interface/control_add_city";
$route['admin-panel/actions/country/countryid/:num/edit/:any']= "admin_interface/control_edit_city";
$route['admin-panel/actions/country/delete/cityid/:num']= "admin_interface/control_delete_city";

$route['admin-panel/actions/shops']= "admin_interface/control_shops";
$route['admin-panel/actions/shops/from']= "admin_interface/control_shops";
$route['admin-panel/actions/shops/from/:num']= "admin_interface/control_shops";

$route['admin-panel/actions/shops/add']= "admin_interface/control_add_shops";
$route['admin-panel/actions/shops/countryid/:num/cityid/:num/edit/:any']= "admin_interface/control_edit_shops";
$route['admin-panel/actions/shops/delete/shopid/:num']= "admin_interface/control_delete_shop";

$route['admin-panel/actions/category']			= "admin_interface/control_category";
$route['admin-panel/actions/category/add']		= "admin_interface/control_add_category";
$route['admin-panel/actions/category/edit/:any']= "admin_interface/control_edit_category";
$route['admin-panel/actions/category/delete/categoryid/:num']= "admin_interface/control_delete_category";

$route['admin-panel/actions/events/add']	= "admin_interface/control_add_events";
$route['admin-panel/actions/events/edit/:any']= "admin_interface/control_edit_events";
$route['admin-panel/actions/events/delete/eventsid/:num']= "admin_interface/control_delete_events";

$route['admin-panel/actions/category/categoryid/:num/seriesid/:num/edit'] = "admin_interface/control_edit_series";

$route['admin-panel/actions/cabinet']			= "admin_interface/admin_cabinet";
$route['admin-panel/actions/download-catalog']	= "admin_interface/download_catalog";