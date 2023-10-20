<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\Models\Author;

class AuthController extends Controller{

    public function loginToken(Request $request)  {

        
        $data = $request->only('email', 'password');


        if(auth('web')->attempt($data)) {

            $user = auth()->user();

            $token = $user->createToken('authToken')->plainTextToken;

            
            if ($user->role === 'author') {

                return response()->json([
                    'token' => $token,
                    'message' => 'Вход выполнен успешно',
                    'user' => 'Автор'
                ]);
     
            }

            else if ($user->role === 'admin') {

                return response()->json([
                    'token' => $token,
                    'message' => 'Вход выполнен успешно',
                    'user' => 'Админ'
                ]);
            }

            
        }

        return response()->json(['message' => 'Неверный логин или пароль'], 401);
    
    }

    public function login(Request $request)  {

        
        $data = $request->only('email', 'password');


        if(auth('web')->attempt($data)) {

            $user = auth()->user();

            $token = $user->createToken('authToken')->plainTextToken;
            
            if ($user->role === 'author') {

                return redirect()->route('home');
     
            }

            else if ($user->role === 'admin') {

                auth('admin')->login($user);

                return redirect()->route('admin.books.index');
            }

            
        }

        return redirect()->route('login');
    
    }

    public function show(AuthRequest $request) {

        return view ('auth/login');

    }

    public function showRegister(AuthRequest $request) {
        return view ('auth/rerister')->withErrors($request->validated());
    }

    public function logout() {

        auth()->logout();

        return redirect()->route('login');
    }

    public function register(AuthRequest $request) {
        
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        $author = new Author;
        $author->name = $user->name;
        $author->user_id = $user->id;
        $author->save();


        return redirect()->route('login');
    }
}
