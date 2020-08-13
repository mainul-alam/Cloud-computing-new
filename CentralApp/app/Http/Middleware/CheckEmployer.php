<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckEmployer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('welcome');
        }

        if (Auth::user()->type == 'employee') {
            return redirect()->route('employee');
        }

        if (Auth::user()->type == 'employer') {
            return $next($request);
        }
    }
}
