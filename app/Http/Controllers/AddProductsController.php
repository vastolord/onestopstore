<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Photo;
use App\Product;
use App\Category;
use App\Brand;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\AddProductsRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


use Illuminate\Http\Request;

use App\Http\Requests;

class AddProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $products = Product::all(); 

        return view('manager.products.index',compact('products'));

    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create()
    {
        //
        $brands = Brand::pluck('brand','id')->all();
        $categories = Category::pluck('name','id')->all();
        return view('manager.products.create',compact('categories','brands'));
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    public function store(AddProductsRequest $request)
    {
        //
        if($request['rchoice']=='name')
            {
            
            $this->validate($request, [
                'brand_name' => 'required|min:2|max:25',
            ]);

            $brand = $request['brand_name'];

            $input = $request->except(['rchoice','brand_name']);

            $exist = Brand::where('brand',$brand)->first();

            if($exist){        
                $input['brand_id'] = $exist->id;
            }else{
                $brand = Brand::create(['brand'=>$brand]);
                $input['brand_id'] = $brand->id;
            }
            
        }

        // return $input;
        // $input = $request->all();

        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();
            // $prodImgPath = 'images/Product/'.$request->category_id;
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        Product::create($input);
        Session::flash('created_product','New product has been added.');
        return redirect()->route('products.index');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // *
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
     
    public function edit($id)
    {
        //

        $brands = Brand::pluck('brand','id')->all();
        
        $product = Product::findOrFail($id);

        $categories =Category::pluck('name','id')->all();

        return view('manager.products.edit',compact('product','categories','brands'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request, $id)
    {
        //
        if($request['rchoice']=='name')
        {   
            $this->validate($request, [
                'brand_name' => 'required|min:2|max:25',
            ]);

            $brand = $request['brand_name'];

            $input = $request->except(['rchoice','brand_name']);

            $exist = Brand::where('brand',$brand)->first();

            if($exist){        
                $input['brand_id'] = $exist->id;
            }else{
                $brand = Brand::create(['brand'=>$brand]);
                $input['brand_id'] = $brand->id;
            }
            
        } else { 
            
            $this->validate($request, [    
            'category_id'=>'required',
            'brand_id'=>'required',
            ]);
            
            $input = $request->except(['rchoice','brand_name']); 
        }


        // return $input;



        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();
            // $prodImgPath = 'images/Product/'.$request->category_id;
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $product = Product::findOrFail($id);

        // $user = Auth::user();
        // $user->posts()->whereId($id)->first()->update($input);

        $product->update($input);

        Session::flash('updated_product','Product no. '.$id.' has been updated successfully!');

        return redirect()->route('products.index');

    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
        //

        $product = Product::findOrFail($id);
        
        if($product->photo_id){

        if(File::exists(public_path().$product->photo->file)){         //if image file exists
        unlink(public_path().$product->photo->file);
        // $product->photos()->delete(); 
            }
        }
        
        $product->delete();
        
        Session::flash('deleted_product','Product deleted successfully.');


        return redirect()->route('products.index');  

    }
}
