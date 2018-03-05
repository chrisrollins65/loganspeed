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

/**
 * Set the locale based on the first segment of the request
 * I would've loved to have done this in a middleware,
 * but since routes are defined before middleware, this will have to do...
 */
if ( in_array(request()->segment(1), config('app.languages')) ) {
    app()->setLocale(request()->segment(1));
}

Route::group(['prefix'=>app()->getLocale()], function(){

    Route::get('/', function () {
        return view('index');
    });

    Route::get('services', function () {
        return view('services');
    });

    Route::group(['middleware' => ['spam']], function() {
        Route::post('contact', ['as' => 'postContact', 'uses' => 'ContactController@postContact']);
    });

});