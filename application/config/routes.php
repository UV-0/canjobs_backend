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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// $route['register'] = 'api/Authorisation/register';
// $route['login'] = 'api/Authorisation/login';
// $route['getProfile'] = 'api/naukari/getProfile';


///////// Admin //////////////
$route['admin_login'] = 'api/Admin_registration/login';
$route['admin/getallEmployeeView'] = 'api/employee_api/allEmployeeView';
$route['admin/getAllEmployeeDetail'] = 'api/employee_api/allEmployeeDetail';
$route['admin/getEmployeeSkill'] = 'api/employee_api/allEmployeeSkill';
$route['admin/getEmployeeCareer'] = 'api/employee_api/allEmployeeCareer';
$route['admin/getEmployeeEducation'] = 'api/employee_api/allEmployeeEducation';
$route['admin/getAllJobs'] = 'api/employer_api/allJobs';
$route['admin/getAllJobsCategory'] = 'api/employer_api/allJobCategory';
$route['admin/getAllEmployer'] = 'api/employer_api/allEmployer';
$route['admin/addFollowup'] = 'api/admin_api/followUp';
$route['admin/addAdmin'] = 'api/admin_api/addAdmin';
$route['admin/getFollowup'] = 'api/admin_api/followup';
$route['admin/addCategory'] = 'api/employer_api/addCategory';


///////// Employee //////////////
$route['employee_signup'] = 'api/Employee_registration/signup';
$route['employee_login'] = 'api/Employee_registration/login';
$route['employeePersonal_detail'] = 'api/employee_api/employeePersonal_detail';
$route['employeeSkill'] = 'api/employee_api/employeeSkill';
$route['employeeEducation_detail'] = 'api/employee_api/employeeEducation_detail';
$route['employeeCareer_detail'] = 'api/employee_api/employeeCareer_detail';
$route['getEmployeeDetail'] = 'api/employee_api/employeeDetail'; 
$route['getEmployeeCareer'] = 'api/employee_api/employeeCareer';
$route['getEmployeeEducation'] = 'api/employee_api/employeeEducation';
$route['getEmployeeSkill'] = 'api/employee_api/employeeSkill';
$route['deleteEmployee/(:num)'] = 'api/employee_api/employee/$1';
$route['deleteEmployeeCareer'] = 'api/employee_api/deleteEmployeeCareer';
$route['deleteEmployeeEducation'] = 'api/employee_api/deleteEmployeeEducation';
$route['deleteEmployeeSkill'] = 'api/employee_api/deleteEmployeeSkill';

////////// Employer ////////////
// $route['employer'] = 'api/employer_api/index';
$route['employer_signup'] = 'api/Employer_registration/signup';
$route['employer_login'] = 'api/Employer_registration/login';
$route['company_detail'] = 'api/employer_api/company_detail';
$route['contact_detail'] = 'api/employer_api/contact_detail';
$route['company_kyc_detail'] = 'api/employer_api/company_kyc_detail';
$route['addJobs'] = 'api/employer_api/addJobs';

$route['applyJob'] = 'api/employer_api/apply_job';
// $route['getAppliedCandidateList'] = 'api/employer_api/applied_candidateList';
$route['view_jobs'] = 'api/employer_api/view_jobs';
$route['deleteEmployer/(:num)'] = 'api/employer_api/employer/$1';
$route['deletejobCategory/(:num)'] = 'api/employer_api/jobCategory/$1';
$route['deletejob/(:num)'] = 'api/employer_api/job/$1';
$route['getallEmployeeView'] = 'api/employee_api/allEmployeeView';
$route['getJobResponse'] = 'api/employee_api/allEmployeeView';
$route['getEmployer'] = 'api/employer_api/getEmployer';

