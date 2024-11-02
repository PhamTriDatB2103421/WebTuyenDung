<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('index');
// login
Route::get('/login-a', [UserController::class, 'login_a'])->name('login');
Route::get('/login-b', [UserController::class, 'login_b'])->name('register_a');
Route::post('/auth', [UserController::class, 'auth'])->name('auth');
Route::post('/register', [UserController::class, 'register_user'])->name('register');

Route::middleware(['admin'])->prefix('admin')->group(function () {
        Route::get('index', function () { return view('admin.pages.index'); })->name('admin.pages.index');
        //user
        Route::get('user/list', [UserController::class, 'list'])->name('admin.user.list');
        Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit_form');
        Route::put('user/edit/update/{id}', [UserController::class, 'update'])->name('admin.user.edit.update');
        Route::get('user/add', [UserController::class , 'add'])->name('admin.user.add_form');
        Route::post('user/store', [UserController::class , 'store'])->name('admin.user.store');
        Route::get('user/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');

});

