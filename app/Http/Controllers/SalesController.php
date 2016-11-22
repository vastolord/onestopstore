<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\SalesRequest;
use Illuminate\Support\Facades\Session;
use App\Sale;
use App\Product;
use Carbon;



class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sales=Sale::all();
        // return Carbon::now();

        return view('manager.sales.index',compact('sales'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPrevious()
    {
        //
        // $categories = Category::pluck('name','id')->all();
        $previous = Sale::onlyTrashed()->get();

        return view('manager.sales.deleted',compact('previous',$previous));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalesRequest $request)
    {


        //
        $input = $request->all();
        // return $input;
        $input['amount'] = $request->amount/100;

        // return $input;

        Sale::create($input);
        Session::flash('created_sale','New sale has been added.');
        return redirect()->route('sales.index');

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

        return view('manager.sales.index');
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
    
        $sale = Sale::findOrFail($id);

        return view('manager.sales.edit',compact('sale'));

    }

    public function addSaleProduct($id)
    {
        //
    
        $sale = Sale::findOrFail($id);
        $products = Product::all();

        $onsale = Product::where('sale_id','=',$sale->id)->get();
        
        // return $onsale;
        return view('manager.sales.saleproduct',compact('sale','products','onsale'));

    }

    public function attachProduct(Request $request, $sid)
    {
        //
        $input = $request->all();
        $pid = $input['pid'];
        $product = Product::findOrFail($pid);
        $product['sale_id'] = $sid;
        $product->save();

        return redirect()->route('sales.add.product',$sid);

    }

    public function detachProduct($id)
    {
        //
        $product = Product::findOrFail($id);
        $sid = $product['sale_id'];
        $product['sale_id'] = NULL;
        $product->save();

        return redirect()->route('sales.add.product',$sid);

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

    $this->validate($request, [
        'amount' => 'integer|min:0|max:100',
        ]);


        $input = $request->all();
        $input['amount'] = $request->amount/100;
        


        $sale = Sale::findOrFail($id);

        // $user = Auth::user();
        // $user->posts()->whereId($id)->first()->update($input);

        $sale->update($input);

        Session::flash('updated_sale','Sale no. '.$id.' has been updated successfully!');

        return redirect()->route('sales.index');
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
    
        $sale = Sale::findOrFail($id);
                
        $sale->delete();
        
        Session::flash('deleted_sale','Sale deleted successfully.');

        return redirect()->route('sales.index');  

    }
}
