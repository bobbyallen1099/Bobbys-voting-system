<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PagesController@index')->name('index');


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/dashboard', 'DashboardController@index')->name('dashboard');

    // Admin
    Route::get('/admin', 'DashboardController@index')->name('admin');
    Route::prefix('admin')->name('admin.')->group(function () {

        // Save menu preferences
        Route::post('/menu', 'MenuController@update');

        // Users
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', 'AdminUsersController@index')->name('index');
            Route::get('/create', 'AdminUsersController@create')->name('create');
            Route::post('/create', 'AdminUsersController@store')->name('store');
            Route::prefix('{user}')->group(function () {
                Route::get('/', 'AdminUsersController@show')->name('show');
                Route::get('/edit', 'AdminUsersController@edit')->name('edit');
                Route::post('/edit', 'AdminUsersController@update')->name('update');
                Route::get('/delete', 'AdminUsersController@confirmdelete')->name('confirmdelete');
                Route::post('/delete', 'AdminUsersController@delete')->name('delete');
            });
        });

        // Features
        Route::prefix('features')->name('features.')->group(function () {
            Route::get('/', 'FeatureController@index')->name('index');
            Route::post('/{feature}/vote', 'FeatureController@storeFeatureVote')->name('vote.store');
        });
    });
});