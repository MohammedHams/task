<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class AdminMiddleware
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
      // user is authnticated
          if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'admin') 
        return $next($request);
        else return redirect ('/login');
    }
}
