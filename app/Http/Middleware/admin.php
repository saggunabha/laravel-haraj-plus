<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard=null)
    {

        if (Auth::user() &&  Auth::user()->type == 1) {
            return $next($request);
        }else if(!Auth::user()){
            // return view('website.register');
              return redirect()->route('login');
            //   return abort(404);
        }
        else
            return abort(401);
    }
}
