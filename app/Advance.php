<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    protected $fillable=['firstname','lastname','street','country','province','city','postcode','phone'];




    public function user(){


        return $this->belongsTo('App\User');


    }
   /* public function photo(){


        return $this->belongsTo('App\Photo');


    }
    public function category(){


        return $this->belongsTo('App\Category');


    }*/
}
