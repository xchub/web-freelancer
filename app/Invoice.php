<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference_nb', 'client_id', 'due_date', 'notes', 'tax', 'recurring', 'recurring_frequency', 'recurring_start', 'recurring_end', 'recurring_next',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function items()
    {
        return $this->hasMany('App\InvoiceItem');
    }
}
