<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'ProfileController@getIndex');
Route::get('/profiles/all', 'ProfileController@getAll');

Route::get('/profiles/create', 'ProfileController@getCreate');
Route::post('/profiles/create', 'ProfileController@postCreate');

Route::get('/about', 'ProfileController@getAbout');

Route::get('/profiles/edit/{id?}', 'ProfileController@getEdit');
Route::post('/profiles/edit', 'ProfileController@postEdit');

Route::get('/profiles/confirm-delete/{id?}', 'ProfileController@getConfirmDelete');
Route::get('/profiles/delete/{id?}', 'ProfileController@getDoDelete');

Route::get('/profiles/show/{id?}', 'ProfileController@getShow');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database p4');
        DB::statement('CREATE database p4');

        return 'Dropped p4; created p4.';
    });

};

