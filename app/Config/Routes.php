<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('complaint_form', 'form_controller::index');
$routes->get('submitted_form', 'form_controller::submit');
$routes->post('submit_complaint', 'form_controller::submit_complaint');
$routes->get('admin_login', 'form_controller::admin_form');
$routes->post('getComplaintTitles', 'form_controller::getComplaintTitles');
$routes->post('getLocalities', 'form_controller::getLocalities');
$routes->post('getStreets', 'form_controller::getStreets');
$routes->get('report', 'form_controller::report');
$routes->get('reportpdf', 'form_controller::reportpdf');
$routes->post('submit_form','form_controller::submit_form');
$routes->post('getComplaintTitlesByType','form_controller::getComplaintTitlesByType');
$routes->get('user_report/(:any)/(:any)', 'form_controller::userdetails/$1/$1');
$routes->add('generatePDF','form_controller::generatePDF');
$routes->get('user_report_total/(:any)/(:any)', 'form_controller::userdetailstotal/$1/$1');


