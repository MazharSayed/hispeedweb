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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/category', 'HomeController@categoryshow')->name('category');
Route::post('/category', 'HomeController@categorycreated')->name('categorycreated');

Route::get('/edit_category/{id}','HomeController@edit_category')->name('edit_cate');
Route::post('/edit_category/{id}','HomeController@category_update')->name('edit_cate');
Route::get('/del-cate/{id}','HomeController@del_category')->name('del.cate');

Route::get('/brand', 'HomeController@brandshow')->name('brand');
Route::post('/brand', 'HomeController@brandcreated')->name('brandcreated');

Route::get('/edit_brand/{id}','HomeController@edit_brand')->name('edit_brand');
Route::post('/edit_brand/{id}','HomeController@brand_update')->name('edit_brand');
Route::get('/del-brand/{id}','HomeController@del_brand')->name('del.brand');


Route::get('/product', 'HomeController@productshow')->name('product');
Route::post('/product', 'HomeController@productcreated')->name('productcreated');

Route::get('/edit_product/{id}','HomeController@edit_product')->name('edit_product');
Route::post('/edit_product/{id}','HomeController@product_update')->name('edit_product');
Route::get('/del-product/{id}','HomeController@del_product')->name('del.product');




Route::get('/customer', 'HomeController@customer')->name('customer');
Route::get('/del-cust/{id}','HomeController@del_customer')->name('del.cust');

Route::get('/cust_req', 'HomeController@customer_request')->name('cust.req');
Route::get('/del-register/{id}','HomeController@del_register')->name('del.register');



Route::get('/detail/{id}', 'HomeController@request_detail')->name('req.detail');

