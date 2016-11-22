<?php

namespace App\Http\Controllers;

use App\Advance;
use App\Cart;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdvanceUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function index()
    {
        if(!Session::has('cart')){
            return view('cart');
        }
        $oldcart=Session::get('cart');
        $cart=new Cart($oldcart);
        $total=$cart->totalPrice;
        return view('admin.posts.newcheck3',['total'=>$total]);
        //return view('admin.posts.newcheck2');
    }*/

    public function index()
    {
        $userid=Auth::user()->first_name;
        //$user=Advance::find($userid);
        //return $userid;

        $aduser = Advance::where('firstname',$userid)->get()->all();
        $user = Advance::where('firstname',$userid)->first();



        //return $user;

        if($userid=$aduser){


            return view('cart.advance.edit',compact('user'));

        }
        else
            
        return view('cart.advance.create');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $input=$request->all();
        Advance::create($input);
        if(Session::has('shipurl')){
            Session::get('shipurl');
            Session::forget('shipurl');
            return redirect('/checkout');

        }
        return redirect('/');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        //$user=Auth::user();

        //$input['user_id']=$user->id;

        
        //Return $input;

        Advance::create($input);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $input = $request->all();
        $user = Advance::findOrFail($id);

        $user->update($input);
        if(Session::has('shipurl')){
            Session::get('shipurl');
            Session::forget('shipurl');
            return redirect('/checkout');

        }
        return redirect('/');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
