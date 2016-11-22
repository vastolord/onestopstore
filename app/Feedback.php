<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //

    protected $fillable = [
    	'comment','user_id','product_id',
    ];




    public function user(){
    	
    	return $this->belongsTo('App\User');

    }

    public function product(){
    	
    	return $this->belongsTo('App\Product');

    }

}
