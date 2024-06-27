<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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

// GET POST ==> Method HTTP

// URL (Uniform Resource Locator)

Route::get('/', function () {
    return view('welcome');
});

Route::get('/list-user', [UserController::class, 'index']);

Route::fallback(function (){
   return "Page not found";
});

// Slug
// http://127.0.0.1:8000/user/1
Route::get('/list-user/{id}', [UserController::class, 'show']);

// Params
// http://127.0.0.1:8000/user?id=1
Route::get('/user', [UserController::class, 'update']);

Route::get('thong-tin-sv', [UserController::class, 'info']);
