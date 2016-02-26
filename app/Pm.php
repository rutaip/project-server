<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pm extends Model
{
    protected $fillable = [
        'first',
        'last',
        'email',
        'region_id',
        'color'

    ];

    /**
     * A user has many Projects
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return$this->hasMany('App\Project');
    }

    public function region()
    {

        return $this->belongsTo('App\Region');
    }

}
