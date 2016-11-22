<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Notifications\AccountVerification;
use App\User;

class AccountVerificationController extends Controller
{
    //
        public function sendmail(Request $request)
    {
        // //
  //       $id;
  //       // $user= Auth::user();
  //       // $user->notify(new AccountVerification($user));
    	if (Auth::check())
		{
			$id=Auth::user()->id;
			
		}
			$user=User::find($id);
			// return $user;
			// $post=Post::find(12);
			$user->notify(new AccountVerification($user));
			Session::flash('waitforverification', 'Go to your email to verify this account.');
			return redirect('/');
    }



  public function confirm($conf_code)
    {
        if( ! $conf_code)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user = User::where('conf_code',$conf_code)->first();

        if ( ! $user)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user->is_active = 1;
        $user->conf_code = null;
        $user->save();

        Session::flash('verified','You have successfully registered your account.');

        return redirect('/');
    }



}
