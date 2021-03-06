<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'subtitle', 'image', 'author_id', 'published_at', 'content'];
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
