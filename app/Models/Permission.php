<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Permission extends Model {
    protected $fillable = [
        'title'
    ];

    public function roles() {
        return $this->belongsToMany(Role::class, 'role_permissions');
    }

    protected function setTitleAttribute($title) {
        $this->attributes['slug'] = Str::slug($title);
        $this->attributes['title'] = $title;
    }
}
