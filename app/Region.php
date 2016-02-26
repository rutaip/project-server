<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'region',
        'color'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function projects()
    {

        return $this->belongsTo('App\Project');
    }

    public function partners()
    {

        return $this->belongsTo('App\Partner');
    }

    public function pms()
    {

        return $this->belongsTo('App\Pm');
    }


}
