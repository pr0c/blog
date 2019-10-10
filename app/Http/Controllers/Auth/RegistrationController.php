<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class RegistrationController extends BaseController {
    public function create() {
        return view('registration.create');
    }

    public function store() {
        $validator = $this->validate(request(), [
            'nickname' => 'required|unique:users',
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'password' => 'required|confirmed'
        ]);

        if(!$validator) {
            return view('registration.create')->withErrors($validator);
        }

        $user = User::create(request()->all());
        auth()->login($user);

        return redirect()->to('/blog/categories');
    }
}
