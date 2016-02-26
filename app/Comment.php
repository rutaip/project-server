<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment_owner',
        'comment_text',
        'project_id'
    ];
}
