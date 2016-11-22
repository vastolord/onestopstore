<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Product
{
    public $items=null;
    public $totalQty=0;
    public $totalPrice=0;

     public function __construct($oldcart)
     {
             if($oldcart){

                 $this->items=$oldcart->items;
                 $this->totalQty=$oldcart->totalQty;
                 $this->totalPrice=$oldcart->totalPrice;

             }
 
     }
    public function add($item,$id){
        // if($item->onSale()){
        //         // return $item->salePrice();
        // $storedItem=['qty'=>0,'price'=>$item->salePrice(),'item'=>$item];    
        // }
        // else{
        $storedItem=['qty'=>0,'price'=>$item->price,'item'=>$item];
        // }

        if($this->items){
            if(array_key_exists($id,$this->items)){

                $storedItem=$this->items[$id];
            }
        }
        // if($item->onSale()){
        // $storedItem['price']=$item->salePrice()*$storedItem['qty'];
        // // $storedItem=['qty'=>0,'price'=>$item->salePrice(),'item'=>$item];    
        // }
        // else{
        $storedItem['price']=$item->price*$storedItem['qty'];
        // $storedItem=['qty'=>0,'price'=>$item->price,'item'=>$item];
        // }

        $storedItem['qty']++;
        // $storedItem['price']=$item->price*$storedItem['qty'];
        $this->items[$id]=$storedItem;
        $this->totalQty++;
        
        // if($item->onSale()){
        
        // $this->totalPrice+=$item->salePrice();
        // }
        // else{
        $this->totalPrice+=$item->price;
            
        // }

    }
}
