<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;

class RoleController extends BaseController {
    public function addRole() {
        return view('permissions.add_role');
    }

    public function store() {
        $validator = $this->validate(request(), [
            'title' => 'required|unique:roles|max:20'
        ]);

        if(!$validator) {
            return view('permissions.add_role')->withErrors($validator);
        }

        Role::create(request()->all());

        return redirect()->route('add_role');
    }
}
