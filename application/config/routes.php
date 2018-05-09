<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if(defined("BASE_API")){
	$route['default_controller'] = 'api/dashboard';
}else if(defined("BASE_AUTH")){
	$route['default_controller'] = 'auth/dashboard';
}else{
	$route['default_controller'] = 'home';
}
$route['login'] = 'account/login';
$route['register'] = 'account/register';
$route['forget'] = 'account/forget';
$route['logout'] = 'account/logout';
$route['validate'] = 'account/validate';
//$route['profiles'] = 'account/profiles';
$route['ref'] = 'account/ref';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
