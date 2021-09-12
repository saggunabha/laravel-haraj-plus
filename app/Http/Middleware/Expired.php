<?php

namespace App\Http\Middleware;

use App\Models\PromotedUser;
use App\Models\Setting;
use App\User;
use Cassandra\Time;
use Closure;
use Illuminate\Support\Facades\Auth;

class Expired
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
    global $product_no;
       /* if (Auth::user() &&  Auth::user()->is_promoted==1) {
            $time=PromotedTime();
           if($time>0)
           {
               return $next($request);
           }
           else
               abort(403);

        }*/
        if(Auth::user() &&  Auth::user()->is_promoted==0)
        {

              if(checkProductsNo())
                  return $next($request);
              else
                  abort(403);

        }

   return $next($request);
        }



}
