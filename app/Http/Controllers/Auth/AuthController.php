<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends BaseController {
    public function login() {
        return view('registration.login');
    }

    public function auth() {
        if(auth()->attempt(request(['nickname', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'Login or password is incorrect, please try again'
            ]);
        }

        return redirect()->to('/blog');
    }

    public function logout() {
        auth()->logout();

        return redirect()->to('/auth');
    }
}
