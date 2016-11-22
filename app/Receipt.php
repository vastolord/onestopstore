<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = [
        'firstname', 'address', 'phone', 'receiptno','title','qty','totalprice',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
