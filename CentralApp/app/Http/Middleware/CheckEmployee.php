<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CheckEmployee
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
            return $next($request);
        }

        if (Auth::user()->type == 'employer') {
            return redirect()->route('employer');
        }
    }
}
