<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\GenreController;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/


Route::middleware('guest:admin')->group(function(){

    Route::get('login', [AuthController::class, 'show'])->name('login');

    Route::post('login/process', [AuthController::class, 'login'])->name('login.process');

});

Route::middleware('auth:admin')->group(function(){

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('books', BookController::class);

    Route::get('search', [BookController::class,'search'])->name('books.search');

    Route::get('books/authorFilter/{id}', [BookController::class,'authorFilter'])->name('books.authorFilter');

    Route::get('books/genreFilter/{id}', [BookController::class,'genreFilter'])->name('books.genreFilter');

    Route::get('books/sort/AZ', [BookController::class,'sortAZ'])->name('books.sortAZ');

    Route::get('books/sort/ZA', [BookController::class,'sortZA'])->name('books.sortZA');
    
    Route::resource('authors', AuthorController::class);
    
    Route::resource('genres', GenreController::class);
});

