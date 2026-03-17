<?php namespace App\Http\Middleware;

use Closure;

class Language {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$languages = config('app.languages');
		$defaultLocale = config('app.locale');
		$routeName = optional($request->route())->getName();
		$localeFromRoute = null;

		if (is_string($routeName) && strlen($routeName) >= 3 && $routeName[2] === '_') {
			$possibleLocale = substr($routeName, 0, 2);
			if (in_array($possibleLocale, $languages, true)) {
				$localeFromRoute = $possibleLocale;
			}
		}

		$locale = $localeFromRoute;
		if (empty($locale)) {
			$sessionLocale = session('app_locale');
			if (in_array($sessionLocale, $languages, true)) {
				$locale = $sessionLocale;
			}
		}
		if (empty($locale)) {
			$locale = $defaultLocale;
		}

		app()->setLocale($locale);
		session(['app_locale' => $locale]);

		switch(app()->getLocale()){
			case 'en':
				setlocale(LC_TIME, 'en', 'ENG', 'English');
				break;
			case 'es':
				setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
				break;
			case 'ca':
				setlocale(LC_ALL, 'ca_ES', 'Catalan_Spain', 'Catalan');
				break;
		}

		return $next($request);
	}

}
