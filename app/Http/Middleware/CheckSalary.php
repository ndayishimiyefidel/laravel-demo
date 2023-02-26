<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSalary
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)

    {
        if ($request->salary <= 100) {
            return redirect('contact-me'); //url link/path
        }


        return $next($request);
    }
}
