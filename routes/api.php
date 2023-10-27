<?php

use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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




Route::post('login/process', [AuthController::class,'login'])->name('login.process');

Route::resource('books', BookController::class)->only('index','show');
Route::resource('authors', AuthorController::class)->only('index','show');
Route::resource('genres', GenreController::class)->only('index');



Route::middleware('auth:sanctum')->group(function (){

    Route::resource('books', BookController::class)->only('update','destroy');
    Route::resource('authors', AuthorController::class)->only('update');
    
});


