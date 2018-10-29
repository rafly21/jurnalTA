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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['kelola_pengelola'] = 'manajemen_user/Users';
$route['kelola_pengelola/edit_user/(:num)'] = 'manajemen_user/Users/edit_user/$id';
$route['kelola_pengelola/update_user'] = 'manajemen_user/Users/update_user';
$route['kelola_pengelola/delete_user/(:num)'] = 'manajemen_user/Users/delete_user/$id';
$route['tambah_pengelola'] = 'manajemen_user/Users/add_user';
$route['tambah_pengelola/submit_user'] = 'manajemen_user/Users/submit_user';
$route['kelola_pengelola/edit_pass/(:num)'] = 'manajemen_user/Users/edit_pass/$id';
$route['kelola_pengelola/update_pass/(:num)'] = 'manajemen_user/Users/change_pass/$1';
$route['kelola_pengelola'] = 'manajemen_user/Users';
$route['jurnal'] = 'jurnal';
$route['jurnal/tambah_jurnal'] = 'jurnal/add_jurnal';
$route['jurnal/submit_jurnal'] = 'jurnal/submitJurnal';
$route['pengindeks'] = 'pengindeks';
$route['pengindeks/tambah_pengindeks'] = 'pengindeks/add_pengindeks';
$route['pengindeks/insert'] = 'pengindeks/insert_pengindeks';
$route['pengindeks/delete/(:num)'] = 'pengindeks/delete_pengindeks/$1';
$route['pengindeks/edit/(:num)'] = 'pengindeks/update_pengindeks/$1';
$route['pengindeks/update/(:num)'] = 'pengindeks/edit_pengindeks/$1';
$route['lembaga'] = 'lembaga';
$route['lembaga/tambah_lembaga'] = 'lembaga/add_lembaga';
$route['lembaga/insert'] = 'lembaga/insert_lembaga';














$route['home_man'] = 'Manajemen';



$route['cekpermission'] = 'Auth/cekpermission';
$route['auth_process'] = 'Auth/auth_process';
$route['logout'] = 'Logout';


//api
$route["api/(:any)"] = 'Api/getPenerbit/$1';
