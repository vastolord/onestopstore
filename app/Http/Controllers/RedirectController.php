<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    //
    
public function redirectRoles(){

    Session::flash('loggedin',"Welcome ".Auth::user()->name()."! Last Activity: ".Auth::user()->updated_at->diffForHumans());
	if(Auth::user()->hasRole()=='Administrator'){
        return  redirect()->route('admin.index');
        }else if(Auth::user()->hasRole()=='Manager'){
        return  redirect()->route('manager.index');
        }else if(Auth::user()->hasRole()=='Subscriber'){

           //          if(Session::has('oldurl')){
           //              $oldurl=Session::get('oldurl');
           //              Session::forget('oldurl');
           //          // return redirect()->to($oldurl);
           //              return redirect()->route('shop.cart');
           //      }
        			if(Auth::user()->is_active==0){
        				Session::flash('verifyprompt','Verify your email ('.Auth::user()->email.') to complete registration.');
        			}
        return  redirect()->intended();
        }
}

}
