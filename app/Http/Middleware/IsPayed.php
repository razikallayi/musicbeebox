<?php

namespace App\Http\Middleware;

use Closure;

class IsPayed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = '')
    {
        auth()->guard('admin')->logout();
        if (!auth()->user()->is_payed) {
            return redirect('subscribe');
        }
        return $next($request);
    }
}
