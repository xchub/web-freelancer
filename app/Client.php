<?php

namespace App;

class Client
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'contact', 'email', 'website', 'phone', 'address', 'city', 'country',
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
}
