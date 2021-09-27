<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function articleComment()
    {
        return $this->belongsTo(Article::class);
    }
}
