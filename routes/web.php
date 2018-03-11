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

foreach (config('app.languages') as $prefix) {
    Route::group(['prefix' => $prefix], function () use ($prefix) {
        $namePrefix = $prefix . '_';
        Route::get('/', 'MainController@getHome')->name($namePrefix . 'getHome');
        Route::get(trans('routes.company', [], $prefix), 'MainController@getCompany')->name($namePrefix . 'getCompany');
        Route::get(trans('routes.services', [], $prefix), 'MainController@getServices')->name($namePrefix . 'getServices');
        Route::get(trans('routes.rates', [], $prefix), 'MainController@getRates')->name($namePrefix . 'getRates');
        Route::get(trans('routes.contact', [], $prefix), 'ContactController@getContact')->name($namePrefix . 'getContact');

        Route::group(['middleware' => ['spam']], function () use ($namePrefix) {
            Route::post('contact', ['as' => $namePrefix . 'postContact', 'uses' => 'ContactController@postContact']);
        });

    });
}