<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\AuthResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\Models\Author;

class AuthController extends Controller{

    public function login(Request $request)  {

        
        $data = $request->only('email', 'password');


        if(auth()->attempt($data)) {

            $user = auth()->user();

            $user -> token = $user->createToken('authToken')->plainTextToken;

            return new AuthResource($user);         
        }

        return response()->json(['message' => 'Неверный логин или пароль'], 401);
    
    }

    

    public function show() {

        return view('auth.login');

    }

}
