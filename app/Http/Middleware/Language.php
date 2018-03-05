<?php namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Log;

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
		if ( !in_array($request->segment(1), config('app.languages')) ) {
			return redirect(app()->getLocale() . '/' . $request->decodedPath());
		}

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
