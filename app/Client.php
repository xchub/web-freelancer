<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'contact', 'email', 'website', 'phone', 'address', 'city', 'country_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }

    public function country(){
        return $this->belongsTo('App\Country');
    }
}
