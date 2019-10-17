<?php

namespace App\Permissions;

use App\Models\Permission;
use App\Models\Role;

trait HasPermissionsTrait {
    public function roles() {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function permissions() {
        return $this->belongsToMany(Permission::class, 'user_permissions');
    }

    public function hasRole(...$roles) {
        foreach($roles as $role) {
            if($this->roles->contains('slug', $role)) {
                return true;
            }
        }

        return false;
    }

    public function hasPermissionTo($permission) {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    protected function hasPermission($permission) {
        return (bool) $this->permissions->where('slug', $permission->slug)->count();
    }

    protected function hasPermissionThroughRole($permission) {
        foreach($permission->roles as $role) {
            if($this->roles->contains($role)) {
                return true;
            }
        }

        return false;
    }
}
