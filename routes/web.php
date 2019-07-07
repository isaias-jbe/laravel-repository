<?php

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {

    // Clients
    Route::any('clients/search', 'ClientController@search')->name('clients.search');
    Route::resource('clients', 'ClientController');

    // Reports
    Route::get('reports/vue', 'ReportsController@vue')->name('reports.vue');
    // Route::get('reports/months', 'ReportsController@months')->name('reports.months');
    Route::get('reports/years', 'ReportsController@years')->name('reports.years');
    Route::get('reports/months', 'ReportsController@months2')->name('reports.months');

    // Users
    Route::any('users/search', 'UserController@search')->name('users.search');
    Route::resource('users', 'UserController');

    Route::any('products/search', 'ProductController@search')->name('products.search');
    Route::resource('products', 'ProductController');

    Route::any('categories/search', 'CategoryController@search')->name('categories.search');
    Route::resource('categories', 'CategoryController');

    Route::get('/', 'DashboardController@index')->name('admin');
});

Route::get('/', 'Site\SiteController@index');

Route::get('/home', 'HomeController@index')->name('home');
