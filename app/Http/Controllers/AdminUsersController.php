<?php
namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Photo;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;


use Illuminate\Http\Request;

use App\Http\Requests;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all(); 
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        //


        $roles =Role::pluck('name','id')->all();

        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {

        //
        // User::create($request->all());
        if(trim($request->password)==''){

            $input = $request->except('password');
        } else{
        $input = $request->all();
        }


        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();
            
            $file->move('images',$name);
            
            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        $input['by_admin'] = 1;
        $input['password'] = bcrypt($request->password);    
        User::create($input);

        Session::flash('created_post','New post has been created.');
        return redirect('/admin/users');
        // return $request->all();

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
        return view('admin.users.index');
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

        $user = User::findOrFail($id);

        $roles = Role::pluck('name','id')->all();
        
        return view('admin.users.edit', compact('user','roles'));
    


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        //


        if(trim($request->password)==''){
        $input = $request->except('password');
        } else{
        $input = $request->all();
        $input['password'] = bcrypt($request->password);  
        }


        $user = User::findOrFail($id);

        // $input = $request->all();

        if($file = $request->file('photo_id')){

            $name = time(). $file->getClientOriginalName();

            $file->move('images',$name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;

        }
         
        $user->update($input);


        Session::flash('updated_user','The user no. '.$user->id .' has been updated.');
        return redirect('/admin/users');

        // return $request->all();

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
        
        $user = User::findOrFail($id);        
        
        if($user->photo_id){
        if(File::exists(public_path().$user->photo->file)){         //if image file exists
        unlink(public_path().$user->photo->file);
            }
        }
        $user->delete();
        Session::flash('deleted_user','The user has been deleted.');


        return redirect('/admin/users');   


    }



    public function banUnban($id)
    {
        //
        
        $user = User::findOrFail($id);
        
        return view('admin.users.index',compact('users'));       
        
    }
}
