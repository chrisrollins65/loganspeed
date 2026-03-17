<?php

use Illuminate\Http\Request;

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

Route::get('/', 'MainController@getHome')->name('getHome');

Route::get('language/{locale}', function (Request $request, $locale) {
    if (!in_array($locale, config('app.languages'), true)) {
        $locale = config('app.locale');
    }

    session(['app_locale' => $locale]);

    return redirect(iRoute($request->query('route', 'getHome'), [], true, $locale));
})->name('setLanguage');

foreach (config('app.languages') as $locale) {
    $namePrefix = $locale . '_';

    Route::get(trans('routes.company', [], $locale), 'MainController@getCompany')->name($namePrefix . 'getCompany');
    Route::get(trans('routes.services', [], $locale), 'MainController@getServices')->name($namePrefix . 'getServices');
    Route::get(trans('routes.rates', [], $locale), 'MainController@getRates')->name($namePrefix . 'getRates');
    Route::get(trans('routes.contact', [], $locale), 'ContactController@getContact')->name($namePrefix . 'getContact');

    Route::group(['middleware' => ['spam']], function () use ($namePrefix, $locale) {
        Route::post(trans('routes.contact', [], $locale), [
            'as' => $namePrefix . 'postContact',
            'uses' => 'ContactController@postContact'
        ]);
    });
}