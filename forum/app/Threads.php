<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Threads extends Model
{
    protected $fillable = ['title', 'description', 'author_id'];
}
