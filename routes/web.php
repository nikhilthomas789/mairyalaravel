<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/','frontend\HomeController@index');*/



Route::get('/', 'admin\LoginController@login')->name("login");
Route::post('/', 'admin\LoginController@login')->name("login");


Auth::routes();




Route::group( ['middleware' => 'auth','prefix' => 'admin'], function()
{

/*User group*/
Route::get('/file-export','admin\PurchasebillController@fileExport')->name("excel");
Route::group(['middleware'=>'rights'],function()
{
/*User group */
Route::get('/usergroup/create','admin\UsergroupController@create')->name("Usergroup");
Route::get('/usergroup/create/{id}','admin\UsergroupController@create')->name("Usergroup");
Route::get('/usergroup/list','admin\UsergroupController@list')->name("Usergroup");
Route::get('/usergroup/status/{id}','admin\UsergroupController@status')->name("Usergroup");
Route::get('/usergroup/delete/{id}','admin\UsergroupController@delete')->name("Usergroup");
Route::get('/usergroup/permission/{id}','admin\UsergroupController@permission')->name("Usergroup");
Route::post('/usergroup/permission/{id}','admin\UsergroupController@permission')->name("Usergroup");
Route::post('/usergroup/create/{id}','admin\UsergroupController@create')->name("Usergroup");
Route::post('/usergroup/create','admin\UsergroupController@create')->name("Usergroup");

/*User */
Route::get('/user/create','admin\UserController@create')->name("User");
Route::get('/user/create/{id}','admin\UserController@create')->name("User");
Route::get('/user/list','admin\UserController@list')->name("User");
Route::get('/user/status/{id}','admin\UserController@status')->name("User");
Route::get('/user/delete/{id}','admin\UserController@delete')->name("User");
Route::post('/user/create/{id}','admin\UserController@create')->name("User");
Route::post('/user/create','admin\UserController@create')->name("User");



/*Customer */
Route::post('/customer/create','admin\CustomerController@create')->name("Customer");
Route::get('/customer/create','admin\CustomerController@create')->name("Customer");
Route::get('/customer/create/{id}','admin\CustomerController@create')->name("Customer");
Route::post('/customer/create/{id}','admin\CustomerController@create')->name("Customer");
Route::get('/customer/list','admin\CustomerController@list')->name("Customer");
Route::get('/customer/status/{id}','admin\CustomerController@status')->name("Customer");
Route::get('/customer/delete/{id}','admin\CustomerController@delete')->name("Customer");



/*Purchase entry */
Route::post('/purchaseentry/create','admin\PurchaseentryController@create')->name("purchaseentry");
Route::get('/purchaseentry/create','admin\PurchaseentryController@create')->name("purchaseentry");
Route::get('/purchaseentry/create/{id}','admin\PurchaseentryController@create')->name("purchaseentry");
Route::post('/purchaseentry/create/{id}','admin\PurchaseentryController@create')->name("purchaseentry");
Route::get('/purchaseentry/list','admin\PurchaseentryController@list')->name("purchaseentry");
Route::get('/purchaseentry/status/{id}','adminPurchaseentryController@status')->name("purchaseentry");
Route::get('/purchaseentry/delete/{id}','admin\PurchaseentryController@delete')->name("purchaseentry");


/*Purchase return */
Route::post('/purchasereturn/create','admin\PurchasereturnController@create')->name("purchasereturn");
Route::get('/purchasereturn/create','admin\PurchasereturnController@create')->name("purchasereturn");
Route::get('/purchasereturn/create/{id}','admin\PurchasereturnController@create')->name("purchasereturn");
Route::post('/purchasereturn/create/{id}','admin\PurchasereturnController@create')->name("purchasereturn");
Route::get('/purchasereturn/list','admin\PurchasereturnController@list')->name("purchasereturn");
Route::get('/purchasereturn/status/{id}','admin\PurchasereturnController@status')->name("purchasereturn");
Route::get('/purchasereturn/delete/{id}','admin\PurchasereturnController@delete')->name("purchasereturn");


/*Purchase Bill*/
/*Route::get('/purchasebill/list','admin\purchasebillController@list')->name("purchasebill");*/

/*Purchase Bill */
Route::post('/purchasebill/create','admin\PurchasebillController@create')->name("Ledger");
Route::get('/purchasebill/create','admin\PurchasebillController@create')->name("Ledger");
Route::get('/purchasebill/create/{id}','admin\PurchasebillController@create')->name("Ledger");
Route::post('/purchasebill/create/{id}','admin\PurchasebillController@create')->name("Ledger");
Route::get('/purchasebill/list','admin\PurchasebillController@list')->name("Ledger");
Route::get('/purchasebill/list/{id}','admin\PurchasebillController@list')->name("Ledger");

Route::get('/purchasebill/status/{id}','admin\PurchasebillController@status')->name("Ledger");
Route::get('/purchasebill/delete/{id}','admin\PurchasebillController@delete')->name("Ledger");



/*Clients */
Route::get('/client/create','admin\ClientController@create')->name("Client");
Route::get('/client/create/{id}','admin\ClientController@create')->name("Client");
Route::get('/client/list','admin\ClientController@list')->name("Client");
Route::get('/client/status/{id}','admin\ClientController@status')->name("Client");
Route::get('/client/delete/{id}','admin\ClientController@delete')->name("Client");
Route::post('/client/create/{id}','admin\ClientController@create')->name("Client");
Route::post('/client/create','admin\ClientController@create')->name("Client");




/*Video */
Route::get('/requirement/create','admin\RequirementController@create')->name("Requirement");
Route::get('/requirement/create/{id}','admin\RequirementController@create')->name("Requirement");
Route::get('/requirement/list','admin\RequirementController@list')->name("Requirement");
Route::get('/requirement/status/{id}','admin\RequirementController@status')->name("Requirement");
Route::get('/requirement/delete/{id}','admin\RequirementController@delete')->name("Requirement");
Route::post('/requirement/create/{id}','admin\RequirementController@create')->name("Requirement");
Route::post('/requirement/create','admin\RequirementController@create')->name("Requirement");




/*Job */
Route::get('/job/create','admin\JobController@create')->name("Job");
Route::get('/job/create/{id}','admin\JobController@create')->name("Job");
Route::get('/job/list','admin\JobController@list')->name("Job");
Route::get('/job/status/{id}','admin\JobController@status')->name("Job");
Route::get('/job/delete/{id}','admin\JobController@delete')->name("Job");
Route::post('/job/create/{id}','admin\JobController@create')->name("Job");
Route::post('/job/create','admin\JobController@create')->name("Job");
Route::get('/job/applicants/{id}','admin\JobController@applicants')->name("Job");
Route::get('/job/viewsapplicants/{id}','admin\JobController@viewsapplicants')->name("Job");
Route::get('/job/deleteapplicants/{id}','admin\JobController@deleteapplicants')->name("Job");
Route::get('/job/exportpdf','admin\JobController@exportpdf');
Route::get('/job/exportpdfsingle/{id}','admin\JobController@exportpdfsingle');

/*Menu */
Route::get('/menu/create','admin\MenuController@create')->name("Menus");
Route::get('/menu/create/{id}','admin\MenuController@create')->name("Menus");
Route::get('/menu/list','admin\MenuController@list')->name("Menus");
Route::get('/menu/status/{id}','admin\MenuController@status')->name("Menus");
Route::get('/menu/delete/{id}','admin\MenuController@delete')->name("Menus");
Route::post('/menu/create/{id}','admin\MenuController@create')->name("Menus");
Route::post('/menu/create','admin\MenuController@create')->name("Menus");

/*Enquiru*/
Route::get('/enquiry/list','admin\EnquiryController@list')->name("Enquiries");
Route::get('/enquiry/delete/{id}','admin\EnquiryController@delete')->name("Enquiry");
Route::get('/enquiry/view/{id}','admin\EnquiryController@view')->name("Enquiry");

/*Preorder*/
Route::get('/preorder/list','admin\PreorderController@list')->name("Preorder");
Route::get('/preorder/delete/{id}','admin\PreorderController@delete')->name("Preorder");
Route::get('/preorder/view/{id}','admin\PreorderController@view')->name("Preorder");

/*Enquiru*/
Route::get('/vehicle/testdrive/{id}','admin\TestdriveController@list')->name("Testdrive");
Route::get('/vehicle/testdrive/delete/{id}','admin\TestdriveController@delete')->name("Testdrive");
Route::get('/vehicle/testdrive/view/{id}','admin\TestdriveController@view')->name("Testdrive");

/*Moreinfo*/
Route::get('/vehicle/moreinfo/{id}','admin\MoreinfoController@list')->name("Moreinfo");
Route::get('/vehicle/moreinfo/delete/{id}','admin\MoreinfoController@delete')->name("Moreinfo");
Route::get('/vehicle/moreinfo/view/{id}','admin\MoreinfoController@view')->name("Moreinfo");

/*Moreinfo*/
Route::get('/vehicle/emailfriend/{id}','admin\EmailfriendController@list')->name("Emailfriend");
Route::get('/vehicle/emailfriend/delete/{id}','admin\EmailfriendController@delete')->name("Emailfriend");
Route::get('/vehicle/emailfriend/view/{id}','admin\EmailfriendController@view')->name("Emailfriend");

/*Moreinfo*/
Route::get('/vehicle/offerrequest/{id}','admin\OfferrequestController@list')->name("Offerrequest");
Route::get('/vehicle/offerrequest/delete/{id}','admin\OfferrequestController@delete')->name("Offerrequest");
Route::get('/vehicle/offerrequest/view/{id}','admin\OfferrequestController@view')->name("Offerrequest");


/*Enquiru*/
Route::get('/finance/list','admin\FinanceController@list')->name("Finances");
Route::get('/finance/delete/{id}','admin\FinanceController@delete')->name("Finances");
Route::get('/finance/view/{id}','admin\FinanceController@view')->name("Finances");



/*Vehicle */
Route::post('/vehicle/create','admin\VehicleController@create')->name("Vehicle");
Route::get('/vehicle/create','admin\VehicleController@create')->name("Vehicle");
Route::get('/vehicle/create/{id}','admin\VehicleController@create')->name("Vehicle");
Route::post('/vehicle/create/{id}','admin\VehicleController@create')->name("Vehicle");
Route::get('/vehicle/list','admin\VehicleController@list')->name("Vehicle");
Route::get('/vehicle/status/{id}','admin\VehicleController@status')->name("Vehicle");
Route::get('/vehicle/delete/{id}','admin\VehicleController@delete')->name("Vehicle");


Route::get('/vehicle/vehiclegallery/{id}','admin\VehicleController@vehiclegallery')->name("Vehicle");
Route::post('/vehicle/vehiclegallery/{id}','admin\VehicleController@vehiclegallery')->name("Vehicle");
Route::post('/vehicle/vehiclegallery/edit/{id}','admin\VehicleController@vehiclegalleryedit')->name("Vehicle");
Route::get('/vehicle/vehiclegallery/edit/{id}','admin\VehicleController@vehiclegalleryedit')->name("Vehicle");
Route::get('/vehicle/vehiclegallerylist/{id}','admin\VehicleController@vehiclegallerylist')->name("Vehicle");
Route::get('/vehicle/vehiclegallerystatus/{id}','admin\VehicleController@vehiclegallerystatus')->name("Vehicle");
Route::get('/vehicle/vehiclegallerydelete/{id}','admin\VehicleController@vehiclegallerydelete')->name("Vehicle");
/*Photo */
Route::get('/service/create','admin\ServiceController@create')->name("Service");
Route::get('/service/create/{id}','admin\ServiceController@create')->name("Service");
Route::get('/service/list','admin\ServiceController@list')->name("Service");
Route::get('/service/status/{id}','admin\ServiceController@status')->name("Service");
Route::get('/service/delete/{id}','admin\ServiceController@delete')->name("Service");
Route::post('/service/create/{id}','admin\ServiceController@create')->name("Service");
Route::post('/service/create','admin\ServiceController@create')->name("Service");





/*Models */
Route::get('/models/create','admin\ModelsController@create')->name("Models");
Route::get('/models/create/{id}','admin\ModelsController@create')->name("Models");
Route::get('/models/list','admin\ModelsController@list')->name("Models");
Route::get('/models/status/{id}','admin\ModelsController@status')->name("Models");
Route::get('/models/delete/{id}','admin\ModelsController@delete')->name("Models");
Route::post('/models/create/{id}','admin\ModelsController@create')->name("Models");
Route::post('/models/create','admin\ModelsController@create')->name("Models");


/*News */
Route::get('/news/create','admin\NewsController@create')->name("News");
Route::get('/news/create/{id}','admin\NewsController@create')->name("News");
Route::get('/news/list','admin\NewsController@list')->name("News");
Route::get('/news/status/{id}','admin\NewsController@status')->name("News");
Route::get('/news/delete/{id}','admin\NewsController@delete')->name("News");
Route::post('/news/create/{id}','admin\NewsController@create')->name("News");
Route::post('/news/create','admin\NewsController@create')->name("News");

});

/*cropperjs calls*/
Route::post('/page/upload','admin\PageController@upload');
Route::post('/user/upload','admin\UserController@upload');
Route::post('/vehicle/upload','admin\VehicleController@upload');
Route::post('/news/upload','admin\NewsController@upload');
Route::post('/service/upload','admin\ServiceController@upload');
Route::post('/vehicle/uploadg','admin\VehicleController@uploadg');

/*ajax*/
Route::post('/client/getcount/{id}','admin\ClientController@getcount');



Route::post('/vehicle/getmodel','admin\VehicleController@getmodel');
Route::get('/vehicle/getmodel/{id}','admin\VehicleController@getmodel');

/*Company */
Route::get('/company/create','admin\CompanyController@create')->name("Company");
Route::get('/company/create/{id}','admin\CompanyController@create')->name("Company");
Route::get('/company/list','admin\CompanyController@list')->name("Company");
Route::get('/company/status/{id}','admin\CompanyController@status')->name("Company");
Route::get('/company/delete/{id}','admin\CompanyController@delete')->name("Company");
Route::post('/company/create/{id}','admin\CompanyController@create')->name("Company");
Route::post('/company/create','admin\CompanyController@create')->name("Company");
Route::get('/logout/','admin\LoginController@logout');




});



Route::get('/admin/home', 'admin\HomeController@index')->name("Dashboard");