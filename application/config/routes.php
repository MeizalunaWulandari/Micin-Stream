<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['user'] = 'profile';
$route['f/(:any)'] = 'link/file';
$route['c/(:any)'] = 'link/collection';
$route['user/(:any)'] = 'profile/user/$1';
$route['user/(:any)/c'] = 'profile/collection';
$route['user/(:any)/c/(:any)'] = 'profile/show_collection/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
