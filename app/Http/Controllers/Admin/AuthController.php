<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function show() {

        return view('admin.auth.login');
        
    }

    public function login(Request $request) {
        
        $data = $request->only('email', 'password');

        if(auth('admin')->attempt($data)) {
            $user = auth('admin')->user();

            if($user->role == 'admin'){
                return redirect()->route('admin.books.index');
            }

            auth('admin')->logout();
        }


        return view('admin.auth.login')->withErrors(['login' => 'Неверный логин или пароль']);

    }

    public function logout() {
        
        auth('admin')->logout();

        return view('admin.auth.login');

    }
}
