<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
        'role_id', 'by_admin', 'is_active', 'photo_id', 'conf_code', 'ban_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role(){
    return $this->belongsTo('App\Role');
    }

   /* public function isAdmin(){

    if($this->role->name == "Administrator" && $this->is_active==1){

        return true;
    }
    return false;

    }*/

    public function hasRole(){

    return $this->role->name;

    }


    public function photo(){

    return $this->belongsTo('App\Photo');
    }

    public function feedbacks(){

    return $this->hasMany('App\Feedback');
    }


    public function name(){

    return ucwords($this->first_name).' '.ucwords($this->last_name);
    }

    public function products()
    {
        return $this->hasManyThrough('App\Product', 'App\Feedback');
    }

    public function advanced()
    {
        return $this->belongsTo('App\Advanced');
    }


    public function orders()
    {
        return $this->hasMany('App\Order');
    }
    
    public function receipts()
    {
        return $this->hasMany('App\Receipt');
    }



}
