<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advanced extends Model
{
    //
    protected $fillable=['street','country_id','gender','birthday','city','postcode','phone','user_id',];




    public function user(){

        return $this->belongsTo('App\User');
    }

    public function country(){

        return $this->belongsTo('App\Country');
    }


}
