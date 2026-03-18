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
		// Language is driven purely by URL prefix:
		// - Spanish is default (no prefix)
		// - English pages are prefixed with /en/...
		$firstSegment = $request->segment(1);
		$locale = ($firstSegment === 'en') ? 'en' : 'es';

		app()->setLocale($locale);

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
