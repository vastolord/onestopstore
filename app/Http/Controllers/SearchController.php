<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\category;
use App\User;
use App\Sale;
use App\Brand;
use DB;

class SearchController extends Controller
{


    // protected $Qkey, $Qids;
    

    // protected function setQkey($key,$ids){
    //             $this->Qkey = $key;
    //             $this->Qids = $ids;
    // }

    // protected function getQkey(){
    //             return $this->Qkey;
    // }

    // protected function getQids(){
    //             return $this->Qids;
    // }

    // protected function queryMain($trim){
    //         return DB::table('products')->select("products.id as id","photo_id","title","description","price","stock","products.created_at","products.updated_at","name as category")
    //             ->join('categories', 'categories.id', '=', 'products.category_id')
    //             ->where("title","LIKE","%". $trim ."%")
    //             ->orWhere("description","LIKE","%". $trim ."%")
    //             ->orWhere("categories.name", "LIKE", "%". $trim . "%")
    //             ->distinct()
    //             ->get();
    // }


   public function keySearch(Request $request)
    {


        $key = $request->search;
        // return $key;
        $new_string = explode(' ', $key);
        $trimmed= array_except($new_string, ['in']);
        // $product = [];
        $i=0;
        foreach ($trimmed as $trim) {
            
            // $product[$i] = $this->queryMain($trim);
            // $product[$i] = $this->queryMain($trim)->sortBy('category');
            $product = DB::table('products')->select('products.id')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->join('brands','brands.id', '=', 'products.brand_id')
                ->where("title","LIKE","%". $trim ."%")
                ->orWhere("description","LIKE","%". $trim ."%")
                ->orWhere("categories.name", "LIKE", "%". $trim . "%")
                ->orWhere("brand", "LIKE", "%". $trim . "%")
                ->distinct()
                ->get();

            // $product[$i] = DB::table('products')->select("products.id as id","photo_id","title","description","products.created_at","products.updated_at","name as category")
            //     ->join('categories', 'categories.id', '=', 'products.category_id')
            //     ->where("title","LIKE","%". $trim ."%")
            //     ->orWhere("description","LIKE","%". $trim ."%")
            //     ->orWhere("categories.name", "LIKE", "%". $trim . "%")
            //     ->distinct()
            //     ->get();

                // if($i>=1){
                // $product[0] = $product[0]->merge($product[$i]);}
                // $i++;
        }
            // $result = $product[0]->toArray();
            // $result = array_unique($result,SORT_REGULAR);
      
            // return $product;
            // return array_column($product, 'id:');
            
            // $product = (json_encode($product));
            // $product = (json_decode($product));

                // $serialized = serialize($product);
                // $myNewArray = unserialize($serialized);

                // return $product;

            // $product = $product->toArray();
            // $product = array_shift($product);
            // $product = array_values($product);
            // $product = $product->toString();
            // $product = implode( $product);

            foreach ($product as $selected) {
                $ids[] = $selected->id;
            }


            $result = Product::findOrFail($ids);

            // return $result;

            // $this->setQkey($trimmed,$ids);
            // return $this->getQids();
            // return $result;
        return view('search')->with('result', $result)->with('key',$key)->with('ids',$ids);
    }


   public function categorizedSearch($cat)
    {
        
            $key = $cat;

            $product = DB::table('products')->select("products.id")
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->where("categories.name", "LIKE", "%". $cat . "%")
                ->distinct()
                // ->orderBy('title','desc')
                ->get();

                // dd($product);


            foreach ($product as $selected) {
                $ids[] = $selected->id;
            }


            if(!isset($ids)){
                return view('search')->with('key',$key)->with('ids','')->with('result','');
            }

            $result = Product::findOrFail($ids);

        return view('search')->with('result', $result)->with('key',$key)->with('ids',$ids);
    }


   public function brandedSearch($bnd)
    {
        
            $key = $bnd;

            $product = DB::table('products')->select("products.id")
                ->join('brands', 'brands.id', '=', 'products.brand_id')
                ->where("brand", "LIKE", "%". $key . "%")
                ->distinct()
                ->get();

                // dd($product);


            foreach ($product as $selected) {
                $ids[] = $selected->id;
            }


            if(!isset($ids)){
                return view('search')->with('key',$key)->with('ids','')->with('result','');
            }

            $result = Product::findOrFail($ids);

        return view('search')->with('result', $result)->with('key',$key)->with('ids',$ids);
    }







    public function saleSearch(Request $request)
    {
            
            
        $products = Product::SaleProduct()->get();


            foreach ($products as $selected) {
                $ids[] = $selected->id;
            }


            if(!isset($ids)){
    
                return view('search')->with('key','Ongoing Sales')->with('ids','')->with('result','');
    
                }

            // $result = Product::findOrFail($ids);

        return view('search')->with('result', $products)->with('key','Ongoing Sales')->with('ids',$ids);
    }

    // Sorting Functions 

   public function sortAZ(Request $request)
    {
            $ids = $request->ids;
            $key = $request->key;
            $result = Product::findOrFail($ids)->sortBy('title');
        return view('search')->with('result', $result)->with('key',$key)->with('ids',$ids);
    }


   public function sortZA(Request $request)
    {      
            $ids = $request->ids;
            $key = $request->key;
            $result = Product::findOrFail($ids)->sortByDesc('title');
        return view('search')->with('result', $result)->with('key',$key)->with('ids',$ids);
    }


    public function sortPriceHL(Request $request)
    {      
            $ids = $request->ids;
            $key = $request->key;
            $result = Product::findOrFail($ids)->sortByDesc('price');
        return view('search')->with('result', $result)->with('key',$key)->with('ids',$ids);
    }

    public function sortPriceLH(Request $request)
    {      
            $ids = $request->ids;
            $key = $request->key;
            $result = Product::findOrFail($ids)->sortBy('price');
        return view('search')->with('result', $result)->with('key',$key)->with('ids',$ids);
    }
    
    public function catSortSearched(Request $request)
    {      
            $ids = $request->ids;
            $key = $request->key;
            $result = Product::findOrFail($ids)->sortBy('category_id');
        return view('search')->with('result', $result)->with('key',$key)->with('ids',$ids);
    }
    

    public function bndSortSearched(Request $request)
    {      
            $ids = $request->ids;
            $key = $request->key;
            $result = Product::findOrFail($ids)->sortBy('brand_id');
        return view('search')->with('result', $result)->with('key',$key)->with('ids',$ids);
    }


    // Sorting Functions
    



    /**
    get autocomplete
    **/

    public function getqauto(Request $request)
    {
        //
        // return $request->q;

        // $a = Post::pluck('title')->all();
        
        // return $a;
        $q = $request->q;

        $a = DB::table('products')->select(["title","brand"])
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->join('brands','brands.id', '=', 'products.brand_id')
                ->where("title","LIKE","%". $q ."%")
                ->orWhere("description","LIKE","%". $q ."%")
                ->orWhere("categories.name", "LIKE", "%". $q . "%")
                ->orWhere("brand", "LIKE", "%". $q . "%")
                ->distinct()
                ->get();

                $a = $a->toArray();
                $a = array_column($a,"title");
                $a = json_encode($a);

                return $a;
             

    }



}
