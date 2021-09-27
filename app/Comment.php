<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user', 'article_id', 'contentComment'];
    public function articleComment()
    {
        return $this->belongsTo(Article::class);
    }
}
