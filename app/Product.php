<?php

namespace App;



use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = [
        'title', 'description', 'imgpath','price', 'category_id',
        'brand_id','photo_id', 'stock', 'sale_id',
    ];



    public function photo(){

    	return $this->belongsTo('App\Photo');
    }

    
    public function category(){

        return $this->belongsTo('App\Category');
    }
    

    public function brand(){

        return $this->belongsTo('App\Brand');
    }



    public function feedbacks(){

        return $this->hasMany('App\Feedback');
    }

    public function onSale(){
    	if($this->sale_id){
    		return true;
    	}
    	return false;
    }

    public function sale(){
        if($this->onSale()){
        return $this->belongsTo('App\Sale');
    	}
    	return 0;
    }

    public function salePrice(){
        if($this->onSale()){
        return $this->price - $this->price * $this->sale->amount;
    	}
    }

    public function inStock(){
     	if($this->stock>0){
        	return true;
    		}
    	return false;
    }

     public function scopeSaleProduct($query)
    {
        // return $query->whereNull('sale_id');
        return $query->whereNotNull('sale_id');
    }





 	// public function reviewers()
  //   {
  //       return $this->hasManyThrough('App\Feedback','App\User');
  //   }


}
