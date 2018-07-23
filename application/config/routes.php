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
$route['default_controller'] = 'Yescolleges';
$route['404_override'] = 'yescolleges-error-400';
$route['translate_uri_dashes'] = FALSE;




/******* student  *******/



$route["student-account-register"]="Student/studentloginform";
$route["student-authenticate"]="Student/studentsignin";
$route["student-register"]="Student/studentsignup";
$route["student-home"]="Student/studenthome";
$route["activate-user-account/(:any)"]="Student/activate/$1";
$route["student-sendlink"]='Student/sendlink';
$route["student-information/(:any)"]="Student/information/$1";

$route["student-password/(:any)/(:any)"]='Student/passwordform/$1/$2';
$route["student-showpassform"]='Student/showpassword';
$route["student-setting"]="Student/resetpassword";
$route["user-accout-signout"]="Student/signout";



/************administrator routes************/
$route["yessecure-adminlogin"]='Administrator/login';
$route["getadminphoto"]='Administrator/getprofilephoto';
$route['secure-signin']='Administrator/signin';
$route['admin-home']='Administrator/home';
$route['admin-courses']='Administrator/courses';
$route['admin-categories']="Administrator/category";
$route['admin-profile']='Administrator/profile';
$route['admin-enquiry']='Administrator/enquirylist';
$route['student-list']='Administrator/studentlist';
$route['sub-administrators']='Administrator/subadminlist';
$route['colleges-grid']='Administrator/collegelist';
$route['all-colleges']='Administrator/notactivatedcolleges';

$route['admin-college-category']='Administrator/admincollegecategory';
$route['inactive-colleges']='Administrator/inactiveclg';
$route["profile-setting"]='Administrator/profilesetting';
$route["getcollege"]="Administrator/getcolleges";
$route["mailbox-list"]="Administrator/mailbox";
$route["create-mail"]="Administrator/composemail";


$route['courses-section']='Administrator/coursecontent';
$route['career-section']='Administrator/careercontent';

/************administrator routes************/


/* institute basic routs */
$route['institution-login'] = 'Institute/login';
$route['activate-account/(:any)']= 'Institute/activateInstitute/$1';
$route['retrieve-account/(:any)/(:any)']= 'Institute/retrieveInstitute/$1/$2';
$route['institution-messages'] = 'Institute/showMessage';
$route['institution-home'] = 'Institute/home';
$route['institution-profile'] = 'Institute/profile';
$route['institution-userprofile'] = 'Institute/userProfile';
$route['institution-info']= 'Institute/moreInformation';
$route['institution-faq'] = 'Institute/faq';
$route['institution-courses'] = 'Institute/courses';
$route['institution-requests'] = 'Institute/requests';
$route['institution-message'] = 'Institute/messages';
$route['student-enquiry']="Institute/enquiry";
$route['institution-features'] = 'Institute/features';
$route['institution-faq'] = 'Institute/faq';
$route['instituion-logout']='Institute/logoutInstitute';
$route['institution-mailbox']='Institute/collegemailbox';
$route['create-college-mail']='Institute/createmail';
$route['yescolleges-services']='Institute/yesservices';
$route['institution-visitors']='Institute/visitors';
$route['college/(:any)']="Yescolleges/collegeview/$1";

$route['college']="Yescolleges/collegeview";



$route['college-getdata']="Yescolleges/getalldata";

/*** institute error routes***/

$route['institute-error-401'] = 'Institute/error_401';
$route['institute-error-400'] = 'Institute/error_400';
$route['institute-error-403'] = 'Institute/error_403';
$route['institute-error-404'] = 'Institute/error_404';
$route['browser-support-error'] = 'Yescolleges/error_browser';

$route['yescolleges-error-400'] = 'Yescolleges/error400';
$route['institute-error404'] = 'Institute/inserror_404';
$route['college-reviews-page'] = 'Institute/adminclgreviewpage';


$route['category-search-result/(:any)'] = 'Yescolleges/categorysearch/$1';
$route['category-search-result'] = 'Yescolleges/categorysearch';



$route['course-search'] = 'Yescolleges/coursesearch';
$route['search'] = 'Yescolleges/search';
$route['compare-colleges/(:any)/(:any)'] = 'Yescolleges/comparepage/$1/$2';
$route['compare-colleges/(:any)'] = 'Yescolleges/comparepage/$1';
$route['info'] = 'Yescolleges/infopage';
$route['contact'] = 'Yescolleges/contact';
$route['vision-mission'] = 'Yescolleges/vision';
$route['about'] = 'Yescolleges/about';
$route['advertise-with-us'] = 'Yescolleges/adwithus';


/******************** SUB PAGES *************************/

$route['online-admission'] = 'Yescolleges/subpage1';
$route['expert-guidance'] = 'Yescolleges/subpage2';
$route['colleges-top'] = 'Yescolleges/subpage3';
$route['top-reviews'] = 'Yescolleges/subpage4';
$route['secure-payment'] = 'Yescolleges/subpage5';
$route['customer-support'] = 'Yescolleges/subpage6';
$route['allcolleges']='Yescolleges/allcolleges';
$route['allcolleges/(:any)']='Yescolleges/allcolleges/$1';
$route['allcolleges/(:any)/(:any)']='Yescolleges/allcolleges/$1/$2';
$route['application-form'] = 'Student/application';

$route['not-available'] = 'Yescolleges/notavailable';
$route['college-reviews'] = 'Yescolleges/reviews';
$route['top-colleges'] = 'Yescolleges/topcolleges';
$route['courses-category'] = 'Yescolleges/courseicons';
$route['sitemap\.xml'] = "Yescolleges/sitemap";
$route['faq'] = "Yescolleges/faq";
$route['reviews-list']='Administrator/reviewpage';
$route['course-content-section']='Yescolleges/coursesection';
$route['career']='Yescolleges/careersection';

$route['career-individual-section/(:any)']='Yescolleges/careersinglesection/$1';
$route['career-individual-section/(:any)/(:any)']='Yescolleges/careersinglesection/$1/$2';
$route['course-individual-section']='Yescolleges/coursesinglesection';
$route['course-individual-section/(:any)']='Yescolleges/coursesinglesection/$1';
$route['course-individual-section/(:any)/(:any)']='Yescolleges/coursesinglesection/$1/$2';

/*********************** SEO ADMIN SECTION ******************************/

$route['seoadmin']='Seoadmin/loginpage';
$route['seoadmin-home']='Seoadmin/dashboard';