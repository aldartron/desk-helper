<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['login'] = 'login';
$route['newissue'] = 'issues/new_issue';
$route['userpanel/(:any)'] = 'userpanel/index/$1';
$route['contacts'] = 'static_page/contacts';
$route['help'] = 'static_page/help';
$route['issues/create_issue'] = 'issues/create_issue';
$route['issues/(:any)'] = 'issues/issue/$1';
$route['issues/create_message/(:any)'] = 'issues/create_message/$1';
//$route['(:any)'] = 'login';
$route['default_controller'] = 'login';