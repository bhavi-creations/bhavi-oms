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
$route['default_controller'] = 'home';
$route['404_override'] = 'home/error_page';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'home/login_page';
$route['logout'] = 'home/logout';

// department routes
$route['add-department'] = 'department';
$route['insert-department'] = 'department/insert';
$route['manage-department'] = 'department/manage_department';
$route['edit-department/(:num)'] = 'department/edit/$1';
$route['update-department'] = 'department/update';
$route['delete-department/(:num)'] = 'department/delete/$1';

//staff routes
$route['add-staff'] = 'staff';
$route['manage-staff'] = 'staff/manage';
$route['insert-staff'] = 'staff/insert';
$route['profile'] = 'staff/profile';
$route['delete-staff/(:num)'] = 'staff/delete/$1';
$route['edit-staff/(:num)'] = 'staff/edit/$1';
$route['update-staff'] = 'staff/update';

//holidays routes
$route['add-holidays'] = 'holidays';
$route['manage-holidays'] = 'holidays/manage';
$route['view-holidays'] = 'holidays/view';
$route['insert-holidays'] = 'holidays/insert';
$route['delete-holidays/(:num)'] = 'holidays/delete/$1';
$route['edit-holidays/(:num)'] = 'holidays/edit/$1';
$route['update-holidays'] = 'holidays/update';

//projects routes
$route['add-projects'] = 'projects';
$route['manage-projects'] = 'projects/manage';
$route['view-projects'] = 'projects/view';
$route['insert-projects'] = 'projects/insert';
$route['delete-projects/(:num)'] = 'projects/delete/$1';
$route['edit-projects/(:num)'] = 'projects/edit/$1';

//projects tasks routes
$route['add-project-tasks'] = 'project_tasks';
$route['manage-project-tasks'] = 'project_tasks/manage';
$route['view-project-tasks'] = 'project_tasks/view';
$route['insert-project-tasks'] = 'project_tasks/insert';
$route['delete-project-tasks/(:num)'] = 'project_tasks/delete/$1';
$route['edit-project-tasks/(:num)'] = 'project_tasks/edit/$1';

//work reports tasks routes
$route['add-work-reports'] = 'work_reports';
$route['manage-work-reports'] = 'work_reports/manage';
$route['insert-work-reports'] = 'work_reports/insert';
$route['delete-work-reports/(:num)'] = 'work_reports/delete/$1';
$route['edit-work-reports/(:num)'] = 'work_reports/edit/$1';
$route['view-work-reports'] = 'work_reports/view';
$route['add-staff-work-reports'] = 'work_reports/staff_index';
$route['insert-staff-work-reports'] = 'work_reports/staff_insert';
$route['delete-staff-work-reports/(:num)'] = 'work_reports/staff_delete/$1';
$route['edit-staff-work-reports/(:num)'] = 'work_reports/staff_edit/$1';

//salary routes
$route['add-salary'] = 'salary';
$route['manage-salary'] = 'salary/manage';
$route['view-salary'] = 'salary/view';
$route['salary-invoice/(:num)'] = 'salary/invoice/$1';
$route['print-invoice/(:num)'] = 'salary/invoice_print/$1';
$route['delete-salary/(:num)'] = 'salary/delete/$1';
$route['staff-salary-invoice/(:num)'] = 'salary/staff_invoice/$1';
$route['staff-print-invoice/(:num)'] = 'salary/staff_invoice_print/$1';

$route['apply-leave'] = 'leave';
$route['approve-leave'] = 'leave/approve';
$route['leave-history'] = 'leave/manage';
$route['leave-approved/(:num)'] = 'leave/insert_approve/$1';
$route['leave-rejected/(:num)'] = 'leave/insert_reject/$1';
$route['view-leave'] = 'leave/view';

$route['manage-attendance'] = 'attendance/manage';
$route['view-attendance'] = 'attendance/staff_attendance';