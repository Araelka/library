<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Book;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Route::get('/', function()  {
//     return view('home');
// })->name('home');



// Route::middleware('auth')->group(function () {

//         Route::get('logout', [AuthController::class,'logout'])->name('logout');

// });

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware('guest')->group(function () {

    Route::get('books', [BookController::class,'index'])->name('books.index');

    Route::get('book/{id}', [BookController::class,'show'])->name('books.show');

    Route::get('authors', [AuthorController::class,'index'])->name('authors.index');

    Route::get('author/{id}', [AuthorController::class,'show'])->name('authors.show');

    Route::get('genres', [GenreController::class,'index'])->name('genres.index');
    

    Route::get('register', [AuthController::class,'showRegister'])->name('register');

    Route::get('login/show', function()  {
        return view('auth/login_token');
    })->name('login.show');

    Route::post('login/token', [AuthController::class,'loginToken'])->name('login.token');

    Route::post('register/process', [AuthController::class,'register'])->name('register.process');
});

