<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function()  {
//     return view('home');
// })->name('home');

Route::get('/', [BookController::class,'myBooks'])->name('home');

Route::get('login', [AuthController::class,'show'])->name('login');

Route::post('login/process', [AuthController::class,'login'])->name('login.process');


Route::middleware('auth')->group(function () {

    Route::get('logout', [AuthController::class,'logout'])->name('logout');

    Route::get('book/update/{id}', [BookController::class,'update'])->name('book.update');

    Route::get('book/destroy/{id}', [BookController::class,'destroy'])->name('book.destroy');

    Route::get('update/author', [AuthorController::class, 'update'])->name('author.update');

});