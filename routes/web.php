<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::fallback(function () {
    return "Page not found";
});

// Slug
// http://127.0.0.1:8000/user/1
Route::get('/list-user/{id}', [UserController::class, 'show']);

// Params
// http://127.0.0.1:8000/user?id=1
Route::get('/user', [UserController::class, 'update']);

Route::get('thong-tin-sv', [UserController::class, 'info']);

// C1
//Route::group(['prefix' => 'users'], function (){
//    Route::get('list-users', function (){
//        return "List users";
//    });
//});

// C2
Route::prefix('users')
    ->as('users.')
    ->group(function () {
        Route::get('list-users', [UserController::class, 'index'])->name('listUsers');

        Route::get('add-users', [UserController::class, 'create'])->name('addUsers');
        Route::post('add-users', [UserController::class, 'store'])->name('storeUsers');

        Route::get('edit-users/{id}', [UserController::class, 'edit'])->name('editUser');
        Route::post('edit-users/{id}', [UserController::class, 'update'])->name('updateUser');

        Route::get('delete-users/{id}', [UserController::class, 'destroy'])->name('deleteUser');
    });

// Product
Route::prefix('products')
    ->as('products.')
    ->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');

        Route::get('search', [ProductController::class, 'search'])->name('search');

        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::post('store', [ProductController::class, 'store'])->name('store');

        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('update');

        Route::get('delete/{id}', [ProductController::class, 'destroy'])->name('delete');
    });

Route::get('test', function () {
    return view('admin.products.index');
});
