<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Stripe\Charge;
use Stripe\Stripe;
use App\Order;
use Cookie;


class ProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $request = New Request();
        $product=Product::all();
        // $categories = Category::all()->sortBy('name');
        // $product=$product->simplePaginate(3);
        Session::put('oldurl',$request->url());
        return view('welcome',compact(['product']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function setViewed($count,$id)
    {
        //
        // echo "ok";
        Cookie::queue('name'.$count, $id, 1);
        Cookie::queue('count',($count+1),1);

    }

    // public function getViewed($request,$name)
    // {
    //     //
    //     echo "ok";

    //     return $request->cookie($name);

    //     // return $this->i;

    // }



    public function detail(Request $request, $id)
    {
        //
        $recent = [];
        // $recprod =[];

        $product = Product::find($id);

        $count = $request->cookie('count');
        if($count>9)$count=0;

        $this->setViewed($count, $id);
        
        // $val = $request->cookie('name'.($count-1));
        // return $val;

        for($i=0; $i<=$count; $i++){
        // echo "for";
            $recent[$i] = $request->cookie('name'.$i);
        // echo $recent;
            // $recprod[$i] = Product::where('id',$recent[$i])->get();
        }

        $recent = array_unique($recent,SORT_REGULAR);
        // return $recent;
        $recprod = Product::find($recent);
        // $recprod = Product::where('id',[$recent])->get();
        // $recent = $request->cookie('name'.$i);
        // return $recent;
        // $recprod = array_unique($recprod,SORT_REGULAR);
        // $recprod = (object)$recprod;
        // return $recprod;
        return view('products.detail',compact(['product','recprod']));
        // return view('products.detail')->with('product',$product)->with('recprod',$recprod);
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
    public function addToCart(Request $request, $id)
    {

        $product=Product::find($id);
        $oldcart=Session::has('cart') ? Session::get('cart') : null;
        $cart=new Cart($oldcart);
        $cart->add($product,$product->id);
        $request->session()->put('cart',$cart);
        //dd(Session::get('cart'));
        //$request->session()->flush();
        return redirect('/');

    }


    public function getCart()
    {   
        // $request = new Request();

            if(!Session::has('cart')){
                return view('cart.cart');
            }

        $oldcart=Session::get('cart');
        $cart=new Cart($oldcart);

        Session::put('checkout',1);
        // Session::put('shipurl',$request->url());
        // return $request->all();
        return view('cart.cart',['products'=>$cart->items,'totalprice'=>$cart->totalPrice]);

    }
    

    public function getCheckout()
    {


        if(!Session::has('cart')){
            return view('cart.cart');
        }

     
        $oldcart=Session::get('cart');
        $cart=new Cart($oldcart);
        $total=$cart->totalPrice;
        //return view('cart.shipping',['total'=>$total]);

        return view('cart.checkout',['total'=>$total]);

    }



     public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return view('cart');
        }
        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);
        //$request->session()->put('error');

        Stripe::setApiKey('sk_test_qqPRy8Z5Z8h46fPcdnfINEZS');

        try {
            $token = $request->input('stripeToken');
            $charge=Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $token, //$request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Charge for isabella.anderson@example.com"
            ));

            $order=new Order();
            $order->cart=serialize($cart);
            $user_id=Auth::user()->$id;
            // $order->address=$user->street;
            //$order->address=$request->input('address');
            $order->name=$request->input('name');
            $order->payment_id=$charge->id;
            $order->stock=$cart->totalQty;
            Auth::User()->orders()->save($order);

            Session::forget('checkout');

         /*   $product=Product::find($cart->items->id);
            $product->stock=$cart->totalQty;
            $product->update($product);

            */



        }catch (\Exception $e){

            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        $receipt = Session::get('cart');
        Session::put('receipt',$receipt);
        Session::forget('cart');
        return redirect('receipt');
        //return redirect()->route('checkout.done')->with('success', 'successfully purchased');

    }
    public function getReceipt(Request $request)
    {
        if (!Session::has('receipt')) {
            return redirect('/');
        }
        $receipt = Session::get('receipt');
        $request->session()->forget('receipt');

        $userid=Auth::user()->first_name;
        $user = Advance::where('firstname',$userid)->first();
        $pro=new Receipt();
        $rcp=$receipt->items;
        foreach ($rcp as $p) {



            $enzo[] = [
                'title'=> $p['item']['title'],
                'qty'=> $p['qty'],
                'price'=> $p['price'],
            ];

            //$bro=array_pluck($p,'p.item.title');


        }
        $pro->title=serialize(array_pluck($enzo,'title'));
        $pro->qty=serialize(array_pluck($enzo,'qty'));
        $pro->price=serialize(array_pluck($enzo,'price'));

        $pro->firstname=$user->firstname;
        $pro->address=$user->street;
        $pro->phone=$user->phone;
        $pro->receiptno=005;
        $pro->totalprice=$receipt->totalPrice;
        //return $pro;
        /*$recpt['title']=$receipt->item->title;
        $recpt['qty']=$receipt->item->qty;
        $recpt['totalprice']=$receipt->totalprice;*/
        //Receipt::create($pro);
        Auth::User()->receipts()->save($pro);

        return view('cart.receipt',['products'=>$receipt->items,'totalprice'=>$receipt->totalPrice,'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    

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
