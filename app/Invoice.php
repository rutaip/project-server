<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'currency',
        'agreement',
        'project_id'
    ];
}
