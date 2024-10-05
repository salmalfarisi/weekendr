<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Auth/indexLogin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//route api
$route['api/register'] = 'api/auth/register';
$route['api/login'] = 'api/auth/login';
$route['api/logout'] = 'api/auth/logout';
$route['api/verify'] = 'api/auth/verification';

$route['api/hello'] = 'api/auth/hello';
$route['api/hello2'] = 'api/auth/hello2';
$route['api/hello3/(:any)'] = 'api/auth/hello3/$1';

$route['api/data/index'] = 'api/data/index';
$route['api/data/create'] = 'api/data/create';
$route['api/data/detail/(:any)'] = 'api/data/detail/$1';
$route['api/data/update/(:any)'] = 'api/data/update/$1';
$route['api/data/delete/(:any)'] = 'api/data/delete/$1';