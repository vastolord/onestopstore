<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
// use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Country;
use App\Advanced;
use App\User;
use App\Photo;
use Hash;
use Auth;
use Carbon;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    

   public function usersInfoView()
    {
        //
        
        return view('users.profile');

    }

   public function usersInfoCreate()
    {
        //

        $countries = Country::pluck('name','id')->all();
        // return $countries;
        return view('users.advinfocreate')->with('countries',$countries);

    }

   public function usersInfoStore(Request $request)
    {
        //
        // $this->validate($request)
        // return $countries;
        
        $this->validate($request, [
        
        'first_name' => 'required|min:2|max:20',
        'last_name' => 'required|min:2|max:20',
        'birthday' => 'required',
        'gender' => 'required|min:4|max:6',
        'street' => 'required|min:2|max:20',
        'city' => 'required|min:2|max:20',
        'country_id' => 'required',
        'postcode' => 'required',
        'phone' => 'required|regex:/(0)[0-9]/',
        
        ]);

        $input= $request->all();
        $user = Auth::user();
        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];

        if($file = $request->file('photo_id')){

            if($user->photo_id){

                // return $user->photo->id;
                if(File::exists(public_path().$user->photo->file)){         //if image file exists delete
                    unlink(public_path().$user->photo->file);
                    $user->photo->delete();
                    }
                }

            $name = $user->first_name . time() . $file->getClientOriginalName();
            // $prodImgPath = 'images/Product/'.$request->category_id;
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            
            $user->photo_id = $photo->id;

            // return $user->photo->id;
        }

        // $input['birthday'] = Carbon::createFromFormat('Y-m-d', $input['birthday'])->format('d-M-Y H:i:s');

        $input = $request->except('first_name','last_name','photo_id');

        $input['user_id'] = $user->id;

        // return $input;    
        if($user->advanced){

            $advanced= $user->advanced;

            $advanced->update($input);
            // return $advanced;
        }
        else{

            $advanced = Advanced::create($input);
        }

        $user['advanced_id'] = $advanced->id;

        $user->save();
        // $input = $request->all();
        // return $input;

        Session::flash('info_saved','User Info Saved!');

        return redirect()->route('users.info');
        
        // return redirect()->route('checkout');


        // return view('users.advinfocreate')->with('countries',$countries);

    }


    
    public function changePasswordView()
    {
        //
        return view('users.changepassword');

    }

    public function changePassword(Request $request)
    {
        //
        $this->validate($request, [
                'current_password' => 'required|min:6|max:25',
                'password'=> 'required|min:6|confirmed',
        ]);

        $input = $request->all();
        
        if (Hash::check($input['current_password'], Auth::user()->password )) {
                    $user = Auth::user();
                    // return $user;
                    $user['password'] = bcrypt($input['password']);
                    $user->save();

                    Session::flash('password_changed','New password is set.');
                    return redirect()->route('users.info');
            }else
            {
                    Session::flash('password_unmatched','Enter correct Currnet Password');
                    return redirect()->route('password.change');
            }

        
        // return $input;

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
    public function update(Request $request, $id)
    {
        //
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
