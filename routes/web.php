<?php

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::any('products/search', 'ProductController@search')->name('products.search');
    Route::resource('products', 'ProductController');

    Route::any('categories/search', 'CategoryController@search')->name('categories.search');
    Route::resource('categories', 'CategoryController');

    Route::get('/', 'DashboardController@index')->name('admin');
});

Route::get('/', 'Site\SiteController@index');

//Route::get('/home', 'HomeController@index')->name('home');
