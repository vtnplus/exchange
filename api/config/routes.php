<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if(defined("BASE_ADMIN")){
	
	if(file_exists(FCPATH."resource/router/admin.php")){
		include_once FCPATH."resource/router/admin.php";
	}
}else if(defined("BASE_API")){
	$route['default_controller'] = 'home/get_index';
}else if(defined("BASE_AUTH")){
	$route['default_controller'] = 'auth/dashboard';
}else{
	$route['default_controller'] = 'home';
}
$route['login'] = 'account/login';
$route['register'] = 'account/register';
$route['forget'] = 'account/forget';
$route['forget'] = 'account/logout';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
