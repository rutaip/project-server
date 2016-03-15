<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment_owner',
        'comment_text',
        'project_id',
        'offering_id'
    ];

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
}
