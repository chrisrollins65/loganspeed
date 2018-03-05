<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Spam Filter
|--------------------------------------------------------------------------
|
| The Spam Filter checks if hidden form elements have been submitted.
| If so, this is a bot and the submission is stopped.
| Just need to remember to NEVER USE 'captchaquestion' AS A FORM INPUT NAME
|
*/
class Spam {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$cq = $request->get('captchaquestion');
		if ( !is_null($cq) ){
			if ( strtolower(trim($cq)) != trans('form.captchaanswer')){
				Log::info('SPAM: Form submission stopped on page: '.url()->current()
					.PHP_EOL.'Input '.print_r($request->except('_token'), true));
				// we'll redirect to homepage with a nice message to make bot think
				// form was submitted.
				return redirect('')->with('success', 'Thank you for your submission.');
			}
		}

		return $next($request);
	}

}
