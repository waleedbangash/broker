<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
   //permation
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    Route::get('home','HomeController@index')->name('home');
       //user
       Route::get('user/index','UserController@index')->name('user.index');
       Route::get('user/create','UserController@create')->name('user.create');
       Route::post('user/store','UserController@store')->name('user.store');
       Route::delete('user/massdestroy','UserController@massDestroy')->name('user.massDestroy');

       //services
      Route::get('services/index','ServicesController@index')->name('services.index');
      Route::get('services/create','ServicesController@create')->name('services.create');
      Route::post('services/store','ServicesController@store')->name('services.store');
      Route::get('services/edit/{id}','ServicesController@edit')->name('service.edit');
      Route::post('services/update/{id}','ServicesController@update')->name('service.update');
      Route::delete('services/massdestroy','ServicesController@massDestroy')->name('service.massDestroy');
      Route::delete('services/delete/{id}','ServicesController@destroy')->name('service.delete');



      //bank
      Route::get('bank/index','BankController@index')->name('bank.index');
      Route::get('bank/create','BankController@create')->name('bank.create');
      Route::post('bank/store','BankController@store')->name('bank.store');
      Route::get('bank/edit/{id}','BankController@edit')->name('bank.edit');
      Route::post('bank/update/{id}','BankController@update')->name('bank.update');
      Route::delete('bank/delete/{id}','BankController@destroy')->name('bank.delete');
      Route::delete('bank/massdestroy','bankController@massDestroy')->name('bank.massDestroy');

      //Order
      Route::get('order/index','OrderController@index')->name('order.index');
      Route::get('order/detail/{id}','OrderController@detail')->name('order.detail');
      Route::get('order/invoice/{id}','OrderController@invoice')->name('order.invoice');
      Route::get('order/offers/{id}','OrderController@getAcceptableOffers')->name('order.offers');
      Route::get('order/offersdetail/{order_id}/{provider_id}','OrderController@showdetail')->name('order.offersdetail');
      Route::delete('order/massdestroy','OrderController@massDestroy')->name('order.massDestroy');
      Route::delete('order/offermassdestroy','OrderController@OrderofferMassdestroy')->name('order.offermassDestroy');
      Route::delete('order/delete/{id}','OrderController@orderDestroy')->name('order.destroy');

     //Total_invoices
     Route::get('total_invoices/index','TotalInvoicesController@index')->name('total_invoices.index');
     Route::get('total_invoices/orderbill/{id}','TotalInvoicesController@orderBill')->name('total_invoices.orderbill');
     Route::delete('total_invoices/massdestroy','TotalInvoicesController@massDestroy')->name('total_invoices.massDestroy');

    //conversation
   Route::get('order/conversation/{id}','OrderController@conversations')->name('order.conversation');

   //Clients
   Route::get('clients/index','ClientsController@index')->name('clients.index');
   Route::get('client/detail/{id}','ClientsController@clientDetail')->name('client.detail');
   Route::delete('client/clientdelete/{id}','ClientsController@clientdestroy')->name('client.destroy');
   Route::post('client/user_status/{id}','ClientsController@userStatus')->name('client.userstatus');
   Route::get('client/orders/{id}','ClientsController@clientOrders')->name('client.orders');
   Route::delete('client/massdestroy','ClientsController@massDestroy')->name('client.massDestroy');
   Route::delete('client/ordermassdestroy','ClientsController@ClientorderMassdestroy')->name('client.ordermassDestroy');
   Route::delete('client/orderdelete/{id}','ClientsController@orderdestroy')->name('client.orderdestroy');

   Route::get('client/create','ClientsController@create')->name('client.create');
   Route::post('clien/store','ClientsController@store')->name('client.store');
   Route::get('client/edit/{id}','ClientsController@edit')->name('client.edit');
    Route::post('client/update/{id}','ClientsController@update')->name('client.update');

   //provider
   Route::get('provider/index','ProvidersController@index')->name('providers.index');
   Route::get('provider/create','ProvidersController@create')->name('provider.create');
   Route::post('provider/store','ProvidersController@store')->name('provider.store');
   Route::get('provider/edit/{id}','ProvidersController@edit')->name('provider.edit');
   Route::post('provider/update/{id}','ProvidersController@update')->name('provider.update');


   Route::get('provider/detail/{id}','ProvidersController@providerDetail')->name('provider.detail');
   Route::post('provider/user_status/{id}','ProvidersController@userStatus')->name('provider.userstatus');
   Route::post('provider/verified/{id}','ProvidersController@verify')->name('provider.verify');
   Route::delete('provider/massdestroy','ProvidersController@massDestroy')->name('provider.massDestroy');
   Route::delete('provider/providerdelete/{id}','providersController@providerdestroy')->name('provider.destroy');

   //constont information
   Route::get('information/index','InformationController@index')->name('information.index');
   Route::get('information/edit/{id}','InformationController@edit')->name('information.edit');
   Route::post('information/update/{id}','InformationController@update')->name('information.update');
   Route::delete('information/massdestroy','InformationController@massDestroy')->name('information.massDestroy');

//contact Us
 Route::get('contact/index','ContactController@index')->name('contact.index');
 Route::get('contact/detail/{id}','ContactController@contactDetail')->name('contact.detail');
 Route::post('contact/store/{id}','ContactController@store')->name('contact.store');

 //privacy

 Route::get('privacy/privacy','pagesController@privacy')->name('privacy.privacy');
//who we are
Route::get('whoweare/whoweare','pagesController@whoWeare')->name('whoweare.whoweare');
//terms and condition
Route::get('termsandcondition/termsandcoditon','pagesController@termsAndCondition')->name('t_and_c.t_and_c');

// ads
Route::get('ads/index','AdsController@index')->name('ads.index');
Route::get('ads/create','AdsController@create')->name('ads.create');
Route::post('ads/store','AdsController@store')->name('ads.store');
Route::get('ads/edit/{id}','AdsController@edit')->name('ads.edit');
Route::post('ads/update/{id}','AdsController@update')->name('ads.update');
Route::get('ads/destroy/{id}','AdsController@destroy')->name('ads.destroy');
Route::delete('ads/massdestroy','AdsController@massDestroy')->name('ads.massDestroy');

});
