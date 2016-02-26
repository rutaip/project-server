<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'partner_name',
        'partner_country',
        'region_id',
        'color'

    ];

    public function region()
    {

        return $this->belongsTo('App\Region');
    }}
