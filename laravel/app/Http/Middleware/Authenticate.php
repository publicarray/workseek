<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $type)
    {
        if ($this->auth->guest()){// && $request->user()->role != $type) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('/')->with('message', 'Insufficient Privileges.');
            }
        }

        return $next($request);
    }
}

        // Check for Authentication
        // Route::filter('login', function($route, $request, $type)
        // {
            // if (!(Auth::check() && Auth::user()->role == $type)) {
            //     return Redirect::route('home')->with('message', 'Insufficient Privileges.');
            // }
        // });
