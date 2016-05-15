<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class RedirectAdminIfAuthenticated
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
        if(Session::has('userName'))
        {
            return redirect('/admin/home');
        }
        else
        {
            return $next($request);
        }
    }
}
