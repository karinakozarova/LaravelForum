<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Threads extends Model
{
    protected $fillable = ['title', 'description', 'author_id', 'category_id', 'thumbnail'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function author()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
}
