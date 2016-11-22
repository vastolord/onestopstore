<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;

class Manager
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

            // $user = User::findOrFail(Auth::user()->id)->first();
            $role = Auth::user()->hasRole();       
            // dd($role);
    
            if (!$role == "Manager" || !$role == "Administrator"){
                Session::flash('perm_denied','Permission Denied!');
                return redirect('/');

              } else {

                    if (Auth::user()->is_active==0) {

                        Session::flash('verifyprompt','User is Inactive. Verify email ('.Auth::user()->email.') to complete registration.');
                        return redirect('/');
                    // return $next($request);
                    
                    } else { 
                        return $next($request);
                    }
            }
    

    }

}


}