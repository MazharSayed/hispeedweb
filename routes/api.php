<?php

Route::group([

    'middleware' => 'api',
    'prefix' => 'authV2'

], function () {


Route::post('register', 'ApiController@register');

Route::post('login', 'ApiController@login');

Route::post('logout', 'ApiController@logout');

Route::post('customer_request', 'ApiController@customer_request');

Route::post('product', 'ApiController@product_all');

Route::post('category', 'ApiController@category_all');
});


