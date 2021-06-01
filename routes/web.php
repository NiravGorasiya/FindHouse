<?php

use Illuminate\Support\Facades\Route;

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

Route::get('payment', 'PayPalController@payment')->name('payment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');
//
Route::get('/fb','RegisterController@fbbutton');
Route::get('/fbsubmit','RegisterController@fbsubmit');
Route::get('/fbres','RegisterController@fbres');
Route::get('email','RegisterController@index');
//agent
Route::get('agent/profile','AgentController@index');
Route::post('agent/profile/add','AgentController@show')->name('/agent/profile/add');
Route::get('agent/property','AgentController@agentproperty');
Route::post('agent/property/add','AgentController@store')->name('agent/property/add');
Route::get('agent/property/display','AgentController@display');
Route::get('agent/property/update/{id}','AgentController@edit');
Route::post('agent/property/update/{id}','AgentController@update');
Route::get('agent/dashboard','AgentController@dashboard');
Route::get('review/agentdetails','AgentController@reviewdetails');
Route::get('agent/wishlist','AgentController@agentwishlist');
Route::delete('/Agent/wishlist/Delete/{id}',"AgentController@destroy");
//user
Route::get('user/dashboard','UserController@dashboard');
Route::get('user/profile','UserController@edit');
Route::get('user/wishlist','UserController@userwishlist');
Route::get('user/review','UserController@userreview');
Route::delete('/User/wishlist/Delete/{id}',"UserController@destroy");
Route::post('/user/profile/add','UserController@update')->name('/user/profile/add');
//front controller
Route::get('/','FrontController@index')->name('register.show');
Route::post('/property_review_process','FrontController@store');
Route::get('/property_review_process/{id}','FrontController@review');
Route::get('agent/property/details/{id}','FrontController@agentpropertydetails');
Route::get('property/details/{id}','FrontController@details');
Route::get('/search/{str}','FrontController@search');
Route::get('agent/details','FrontController@agentprofile');
Route::view('contact','front.contact');
Route::post('/contact_from_process','frontcontroller@contact');
Route::post('/add-wishlist','WishlistController@store');
//Add to cart
Route::post('/add-to-cart','AddtocartController@store');
Route::get('/add-to-cart/show','AddtocartController@index');
Route::get('stripe','AddtocartController@show');
Route::get('/stripe-payment', 'AddtocartController@show');
Route::post('/stripe-payment','AddtocartController@handlePost')->name('stripe.payment');
Route::get('/paypal','AddtocartController@paypal');
Route::get('/check-out','AddtocartController@index');
Route::get('handle-payment', 'AddtocartController@handlePayment')->name('make.payment');
Route::get('cancel-payment', 'AddtocartController@paymentCancel')->name('cancel.payment');
Route::get('payment-success', 'AddtocartController@paymentSuccess')->name('success.payment');
//checkout controller
Route::get('payment-submit','AddtocartController@payment');

//Register controller
Route::post('register','RegisterController@register')->name('register'.'user');
Route::get('/verification/{id}',"RegisterController@email_verification");
Route::post('login','RegisterController@login')->name('login'.'user');
Route::post('/forgot_password','RegisterController@forgot_password');
Route::get('forgot_password_change/{id}','RegisterController@forgot_password_change');
Route::post('/forgot_password_change_process','RegisterController@forgot_password_change_process');
//Route::post('register','RegisterController@register')->name('register.show');
Route::get('logout',function(){
       session()->forget('FRONT_USER_LOGIN');
       session()->forget('FRONT_USER_USERNAME');
       session()->forget('FRONT_USER_EMAIL');
       session()->forget('FRONT_USER_ID');
       return redirect('/');
});

Route::get('/google', 'RegisterController@redirectToGoogle');
Route::get('/auth/google/callback','RegisterController@handleGoogleCallback');
//document controller
Route::get("file/create","DocumentController@create");
Route::post("saved-files","DocumentController@store")->name('saved-files');
Route::get('/create','DocumentController@index');
Route::get('/view/{id}','DocumentController@show');
Route::get('/download/{file}','DocumentController@download');
//admin login
Route::get('admin',"AdminController@index");
Route::post('admin','AdminController@auth')->name('admin.auth');
Route::group(['middleware'=>'admin_auth'],function(){
       Route::get('admin/dashboard','Dashboardcontroller@dashboard');   
       Route::get('admin/logout',function(){
              session()->forget('ADMIN_LOGIN');
              session()->forget('ADMIN_ID');
              session()->flash('error','Logot Successfully');
              return redirect('admin');
       });
});       

Route::get('admin/updatepassword','AdminController@updatepassword');
//propertytype
Route::get('admin/propertype',"PropertyTypeController@index");
Route::get('/Propertype/Edit/{id}','PropertyTypeController@getPropertytypeById')->name('propertyType.getbyid');           
Route::put('Propertytype','PropertyTypeController@update')->name('propertytype.update');       
//property category                                                                  
Route::get('admin/property',"PropertyCategoryController@index");
Route::post('admin/propertytype/create',"PropertyCategoryController@create")->name('add.propertytype');
Route::delete('Propertytype/Delete/{id}',"PropertyCategoryController@destroy")->name('propertytype.delete');
Route::get('Propertytype/Edit/{id}','PropertyCategoryController@getPropertypeById')->name('propertype.getbyid');
Route::put('Propertytypecategory','PropertyCategoryController@update')->name('propertytypecategory.update');            
Route::get('userChangeStatus', 'PropertyCategoryController@userChangeStatus');
//country
Route::get('admin/country',"CountryController@index");
Route::post('admin/country/create',"CountryController@create")->name('add.country');
Route::delete('Country/Delete/{id}',"CountryController@destroy")->name('country.delete');
Route::get('Country/Edit/{id}',"CountryController@getCountryById")->name('country.getbyid');
Route::put('Country',"CountryController@update")->name('country.update');            
Route::get('CountryChangeStatus',"CountryController@ChangeStatus");
//state
Route::get('admin/state',"StateController@index");
Route::post('admin/state/create',"StateController@create")->name('add.state');
Route::delete('State/Delete/{id}',"StateController@destroy")->name('state.delete');
Route::get('State/Edit/{id}',"StateController@getStateById")->name('state.getbyid');
Route::put('State','StateController@update')->name('state.update');     
Route::get('StateChangeStatus', 'StateController@ChangeStatus');
//city
Route::get('admin/city',"CityController@index");
Route::post('admin/city/create',"CityController@create")->name('add.city');
Route::delete('City/Delete/{id}',"CityController@destroy")->name('city.delete');
Route::get('City/Edit/{id}',"CityController@getCityById")->name('city.getbyid');
Route::put('/City','CityController@update')->name('city.update'); 
Route::get('CityChangeStatus', 'CityController@ChangeStatus');
//property list
Route::get('admin/listnew/property','PropertyController@index');
Route::get('admin/list/property','PropertyController@show');
Route::get('admin/listview/property/{id}','PropertyController@listview');
Route::get('admin/listproperty/update/{id}','PropertyController@edit');
Route::get('admin/getcountry','PropertyController@getcountry');
Route::get('admin/getcity','PropertyController@getcity');
Route::get('admin/gettypename','PropertyController@gettypename');
Route::post('admin/property/update/{id}','PropertyController@update');
Route::post('property/add','PropertyController@store')->name('admin/property/add');
Route::delete('Property/Delete/{id}',"PropertyController@destroy")->name('property.delete');
Route::get('propertyChangeStatus', 'PropertyController@ChangeStatus');




