<?php

use Illuminate\Http\Request;

Route::get('/maintenance/clear-cache', 'MainController@clearCache')->name('maintenance_clear_cache');

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

// Any request to /es (or /es/*) should permanently redirect to the canonical
// Spanish URL (no prefix).
Route::get('es/{any?}', function (Request $request, $any = null) {
    $path = '/' . ltrim((string) ($any ?? ''), '/');
    $qs = $request->getQueryString();
    return redirect()->to($path . ($qs ? ('?' . $qs) : ''), 301);
})->where('any', '.*');

/**
 * Localized routes
 *
 * Canonical URL scheme:
 * - Spanish (es): no prefix
 * - English (en): /en/ prefix
 */
$localizedRoutes = function (string $locale): void {
    Route::get('/', 'MainController@getHome')->name($locale . '_getHome');
    Route::get(trans('routes.company', [], $locale), 'MainController@getCompany')->name($locale . '_getCompany');
    Route::get(trans('routes.services', [], $locale), 'MainController@getServices')->name($locale . '_getServices');
    Route::get(trans('routes.rates', [], $locale), 'MainController@getRates')->name($locale . '_getRates');
    Route::get(trans('routes.contact', [], $locale), 'ContactController@getContact')->name($locale . '_getContact');

    Route::group(['middleware' => ['spam']], function () use ($locale) {
        Route::post(trans('routes.contact', [], $locale), [
            'as' => $locale . '_postContact',
            'uses' => 'ContactController@postContact'
        ]);
    });
};

foreach (config('app.languages') as $locale) {
    if ($locale === 'en') {
        Route::prefix('en')->group(function () use ($localizedRoutes, $locale) {
            $localizedRoutes($locale);
        });
        continue;
    }

    // Default locale (Spanish) is canonical with no prefix.
    $localizedRoutes($locale);
}