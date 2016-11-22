<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
   protected $fillable = ['id','code','name',];




  public function advancedInfo(){
    	return $this->hasMany('App\AdvancedInfo');
   }




}
