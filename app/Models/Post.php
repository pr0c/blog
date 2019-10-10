<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    protected $fillable = ['title', 'text', 'category_id', 'author_id'];

    public function author() {
        return $this->belongsTo('App\Models\User');
    }
}
