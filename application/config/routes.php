<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Pagination Testing 

$route['default_controller'] = 'IndexController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['razorpayPage']='IndexController/getData';

$route['payment_success']='IndexController/paymentSuccess';
$route['payment_failed']='IndexController/paymentFailed';


// $route['CIpagination']='BackendPaginationAjaxController/CIpagination';

// $route['BackendPaginationAjax']= 'BackendPaginationAjaxController'; // This URL For Backend Pagination Using Ajax.

// URL for backend pagination and search ---->
// $route['BackendPaginationAndSearchAjax']= 'BackendPaginationAjaxController/backendPaginationAndSearchView';





