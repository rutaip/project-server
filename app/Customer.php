<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'customer_name',
        'email',
        'country',
        'region_id',
        'color'

    ];

    public function region()
    {

        return $this->belongsTo('App\Region');
    }
}
