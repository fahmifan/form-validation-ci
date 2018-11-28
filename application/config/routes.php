<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'form/index';

// Auth routes
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';

// Form routes
$route['success'] = 'form/success';

// root
$route['default_controller'] = 'form';
