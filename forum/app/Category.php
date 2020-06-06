<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['parent_id', 'name', 'description', 'author_id'];

    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function author() {
        return $this->belongsTo('App\User');
    }
}
