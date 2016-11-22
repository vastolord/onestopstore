<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    //
	use SoftDeletes;

	
    protected $dates = ['deleted_at'];

	protected $fillable = [
		'amount', 'starting_date', 'ending_date',
	];


	public function products(){

		return $this->hasMany('App\Product');
	}


}
