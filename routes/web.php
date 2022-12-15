<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;

Route::get('/', 'LoadController@homepage');
Route::get('/logout', 'LoadController@logout')->middleware('logedonly');
Route::get('/remove/{id}', 'CrudController@doremoveproduct')->middleware('adminonly');
Route::get('/add', 'LoadController@addproductpage')->middleware('adminonly');
Route::post('/add', 'CrudController@doaddproduct')->middleware('adminonly');
Route::get('/edit/{id}', 'LoadController@editproductpage')->middleware('adminonly');
Route::post('/edit/{id}', 'CrudController@doeditproductpage')->middleware('adminonly');

Route::get('/manage', 'LoadController@categorypage')->middleware('adminonly');
Route::post('/manage', 'CrudController@doaddcategory')->middleware('adminonly');
Route::get('/manage-payment', 'LoadController@paymentcategorypage')->middleware('adminonly');
Route::post('/manage-payment', 'CrudController@doaddpayment')->middleware('adminonly');
Route::get('/manage-delivery', 'LoadController@deliveryoptionpage')->middleware('adminonly');
Route::post('/manage-delivery', 'CrudController@doadddelivery')->middleware('adminonly');
Route::get('/contact', 'LoadController@customorder')->middleware('memberonly');

Route::get('/profile', 'LoadController@profilepage')->middleware('logedonly');
Route::get('/updateprofile', 'LoadController@updateprofilepage')->middleware('logedonly');
Route::post('/updateprofile', 'CrudController@doupdateprofile')->middleware('logedonly');

Route::get('/login', 'LoadController@loginpage')->middleware('guest');
Route::post('/login', 'CrudController@dologin')->middleware('guest');
Route::get('/register', 'LoadController@registerpage')->middleware('guest');
Route::post('/register', 'CrudController@doregister')->middleware('guest');
Route::get('/checkout', 'LoadController@checkoutpage')->middleware('memberonly');
Route::post('/checkout', 'CrudController@docheckout')->middleware('memberonly');

Route::get('/transaction', 'LoadController@transactionpage')->middleware('memberonly');
Route::get('/report', 'LoadController@reportpage')->middleware('adminonly');


Route::get('/cart', 'LoadController@cartpage')->middleware('memberonly');

Route::post('/reportfilter', 'LoadController@reportfilter');
Route::post('/reportbyname', 'LoadController@reportfilterbyname');
Route::post('/search', 'LoadController@searchpage');
Route::get('/detail', 'LoadController@detailpage');
Route::get('/about', 'LoadController@aboutpage');
Route::get('/product', 'LoadController@productpage');
Route::get('/detail/{id}', 'LoadController@productdetailpage');
Route::post('/detail/{id}', 'CrudController@doaddcart')->middleware('memberonly');

Route::get('order{id}', 'LoadController@orderdetail');
Route::get('invoice{id}', 'LoadController@generateInvoice');