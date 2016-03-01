<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Integration extends Model
{
    protected $fillable = [
        'project_id',
        'name',
        'information',
        'developer',
        'url',
        'integration_owner'
    ];
}
