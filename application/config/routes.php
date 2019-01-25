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
$route['jurnal/edit_jurnal/(:num)'] = 'jurnal/edit_jurnal/$1';
$route['jurnal/update_jurnal/(:num)'] = 'jurnal/update_jurnal/$1';
$route['jurnal/delete/(:num)'] = 'jurnal/delete_jurnal/$1';
// $route['jurnal_guest'] = 'jurnal_guest';
$route['jurnal_guest/(:any)'] = 'jurnal_guest/index/$1';
$route['jurnal/filter'] = 'jurnal/index';
$route['jurnal/grafik'] = 'jurnal/grafikJurnal';
$route['jurnal/riwayat/(:num)'] = 'jurnal/riwayatSK/$1';
$route['jurnal/riwayat/create'] = 'jurnal/perbaruiSK';
$route['jurnal/riwayat/delete/(:num)'] = 'jurnal/deleteSK/$1';
$route['jurnal/riwayat/submit/'] = 'jurnal/submitSK/';

$route['jurnal_guest/riwayat/(:num)'] = 'jurnal_guest/riwayatSK/$1';
$route['jurnal_guest/riwayat/create'] = 'jurnal_guest/perbaruiSK';









$route['pengindeks'] = 'pengindeks';
$route['pengindeks/tambah_pengindeks'] = 'pengindeks/add_pengindeks';
$route['pengindeks/insert'] = 'pengindeks/insert_pengindeks';
$route['pengindeks/delete/(:num)'] = 'pengindeks/delete_pengindeks/$1';
$route['pengindeks/edit/(:num)'] = 'pengindeks/update_pengindeks/$1';
$route['pengindeks/update/(:num)'] = 'pengindeks/edit_pengindeks/$1';
$route['lembaga'] = 'lembaga';
$route['lembaga/tambah_lembaga'] = 'lembaga/add_lembaga';
$route['lembaga/insert'] = 'lembaga/insert_lembaga';
$route['lembaga/delete/(:num)'] = 'lembaga/delete_lembaga/$1';
$route['lembaga/edit/(:num)'] = 'lembaga/edit_lembaga/$1';
$route['lembaga/update/(:num)'] = 'lembaga/update_lembaga/$1';
$route['lab'] = 'lab';
$route['lab/tambah_lab'] = 'lab/add_lab';
$route['lab/insert'] = 'lab/insert_lab';
$route['lab/delete/(:num)'] = 'lab/delete_lab/$1';
$route['lab/edit/(:num)'] = 'lab/edit_lab/$1';
$route['lab/update/(:num)'] = 'lab/update_lab/$1';
$route['jurnal-p'] = 'jurnal_pengelola';
$route['jurnal/detail_jurnal'] = 'jurnal/detail_jurnal';
$route['sk'] = 'sk';
$route['sk/tambah_sk'] = 'sk/add_sk';
$route['sk/insert'] = 'sk/insert_sk';
$route['sk/delete/(:num)'] = 'sk/delete_sk/$1';
$route['sk/edit/(:num)'] = 'sk/update_sk/$1';
$route['sk/update/(:num)'] = 'sk/edit_sk/$1';
$route['dept'] = 'departemen';
$route['dept/tambah_dept'] = 'departemen/add_departemen';
$route['dept/insert_dept'] = 'departemen/insert_departemen';
$route['dept/edit_dept/(:num)'] = 'departemen/edit_departemen/$1';
$route['dept/update_dept/(:num)'] = 'departemen/update_departemen/$1';
$route['dept/delete_dept/(:num)'] = 'departemen/delete_departemen/$1';


$route['pengelola'] = 'Pengelola';
$route['pengelola/edit_jurnal/(:num)'] = 'jurnal_pengelola/edit_jurnal/$1';
$route['pengelola/update_jurnal/(:num)'] = 'jurnal_pengelola/update_jurnal/$1';
$route['pengelola/data_pengelola/(:num)'] = 'jurnal_pengelola/edit_dataPengelola/$1';
$route['pengelola/update'] = 'jurnal_pengelola/update_dataPengelola';







$route['home_man'] = 'Manajemen';



$route['cekpermission'] = 'Auth/cekpermission';
$route['auth_process'] = 'Auth/auth_process';
$route['logout'] = 'Logout';


//api
$route["api/(:any)"] = 'Api/getPenerbit/$1';
