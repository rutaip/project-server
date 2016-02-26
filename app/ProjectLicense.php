<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectLicense extends Model
{
    protected $fillable = [
        'name',
        'licenses',
        'project_id'
    ];
}
