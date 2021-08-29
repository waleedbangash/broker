<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//customer
Route::post('customer/requestCOTP','CustomerApi\RegisterController@customerRegisterotp');
Route::post('customer/register','CustomerApi\RegisterController@customerRegister');
Route::post('customer/login','CustomerApi\RegisterController@customerLogin');
Route::post('customer/forgotpassword','CustomerApi\RegisterController@customerForgotPassword');
Route::post('customer/changepassword','CustomerApi\RegisterController@customerChangePaassword');

//provider
Route::post('provider/requestPOTP','ProviderApi\RegisterController@providerRegisterotp');
Route::post('provider/register','ProviderApi\RegisterController@providerRegister');
Route::post('provider/login','ProviderApi\RegisterController@providerLogin');
Route::post('provider/forgotpassword','ProviderApi\RegisterController@providerForgotPassword');
Route::post('provider/changepassword','ProviderApi\RegisterController@providerChangePaassword');

Route::group(['middleware' => ['auth:api']], function () {
//customer
Route::post('customer/order','CustomerApi\OrdersController@customerOrder');
Route::post('customer/showorder','CustomerApi\OrdersController@showOrders');
Route::post('customer/updateorder','CustomerApi\OrdersController@customerOrderUpdate');
Route::post('customer/previousorders','CustomerApi\OrdersController@previousOrders');
Route::post('customer/orderevaluation','CustomerApi\OrdersController@orderEvaluation');
Route::post('customer/showorderbill','CustomerApi\OrdersController@showbill');
Route::post('customer/services','CustomerApi\CustomerController@customerLkp_services');
Route::post('customer/up_profile','CustomerApi\RegisterController@updateProfile');
Route::post('customer/validatetoken','CustomerApi\ValidateToken@customervalidateToken');
Route::post('customer/acceptoffer','CustomerApi\OrdersController@acceptOffer');


//completed order
Route::post('customer/completeorder','CustomerApi\OrdersController@orderCompleted');

//provider
Route::post('provider/up_profile','ProviderApi\RegisterController@updateProfile');
Route::post('provider/offers','ProviderApi\OffersController@providerOffer');


Route::post('provider/validatetoken','ProviderApi\ValidateToken@providervalidateToken');
Route::post('provider/pending_request','ProviderApi\OrderController@pendingRequest');
Route::post('provider/previousorders','ProviderApi\OrderController@previousOrders');
Route::post('provider/currentorder','ProviderApi\OrderController@currentOrders');
Route::post('provider/orderconformation','ProviderApi\OrderController@orderConformation');
Route::post('provider/addingtobill','ProviderApi\OrderController@addingTobill');


//Chat Api
Route::post('chat','ChatApi\ChatController@chat');
Route::post('chat/recivedchat','ChatApi\ChatController@recievedSms');

//notification Api
Route::post('notification/store','NotificationApi\NotificationController@store');
Route::post('notification/get','NotificationApi\NotificationController@get');

//contact api
Route::post('contact/store','ContactApi\ContactController@store');
Route::post('contact/show','ContactApi\ContactController@show');
Route::post('contact/sendmessage','ContactApi\ContactController@sendMessage');
//offline
Route::post('offline','OfflineApi\OfflineController@Offline');

//announcement
Route::post('announcement','AnnouncementApi\announcmentController@announcement');
});
