<?php

namespace App\Models;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model {
    protected $fillable = [
        'title'
    ];

    public function permissions() {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }

    protected function setTitleAttribute($title) {
        $this->attributes['slug'] = Str::slug($title, '-');
        $this->attributes['title'] = $title;
    }
}
