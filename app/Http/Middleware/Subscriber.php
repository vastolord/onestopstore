<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Closure;

class Subscriber
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
        if (Auth::check()) {
            if (Auth::user()->hasRole()=="Subscriber" || Auth::user()->hasRole()== "Manager" || Auth::user()->hasRole()== "Administrator"){

             if(Auth::user()->is_active!=0) {
                return $next($request);
                }

             Session::flash('verifyprompt','User is Inactive. Verify email ('.Auth::user()->email.') to complete registration.');
            
            return redirect('/');
            }

          }
        return redirect('/login');
    }
}
