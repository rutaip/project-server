<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'name',
        'label'

    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
