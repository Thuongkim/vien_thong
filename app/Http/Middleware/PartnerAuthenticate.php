<?php

namespace App\Http\Middleware;

use Closure;

class PartnerAuthenticate
{
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @param  string|null  $guard
    * @return mixed
    */

    public function handle($request, Closure $next, $guard = 'partner')
    {
        if (!\Auth::guard($guard)->check()) {
            if ($request->expectsJson()) return response()->json(['error' => 'Unauthenticated.'], 401);

            \Session::put('login_redirect_partner_' . $guard, \Request::url());
            return redirect()->route('login');
        }
        return $next($request);
    }
}
