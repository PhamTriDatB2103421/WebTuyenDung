<?php

use App\Http\Controllers\DotUngTuyenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViTriController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('index');
// login
Route::get('/login-a', [UserController::class, 'login_a'])->name('login');
Route::get('/login-b', [UserController::class, 'login_b'])->name('register_a');
Route::post('/auth', [UserController::class, 'auth'])->name('auth');
Route::post('/register', [UserController::class, 'register_user'])->name('register');

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('index', function () {
        return view('admin.pages.index');
    })->name('admin.pages.index');
    //user
    Route::get('user/list', [UserController::class, 'list'])->name('admin.user.list');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit_form');
    Route::put('user/edit/update/{id}', [UserController::class, 'update'])->name('admin.user.edit.update');
    Route::get('user/create', [UserController::class, 'add'])->name('admin.user.add_form');
    Route::post('user/create/store', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('user/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
    //dot_ung_tuyen
    Route::get('dotungtuyen/list', [DotUngTuyenController::class, 'list'])->name('admin.dotungtuyen.list');
    Route::get('dotungtuyen/edit/{id}', [DotUngTuyenController::class, 'edit'])->name('admin.dotungtuyen.edit_form');
    Route::put('dotungtuyen/edit/update/{id}', [DotUngTuyenController::class, 'update'])->name('admin.dotungtuyen.edit.update');
    Route::get('dotungtuyen/create', [DotUngTuyenController::class, 'add'])->name('admin.dotungtuyen.add_form');
    Route::post('dotungtuyen/create/store', [DotUngTuyenController::class, 'store'])->name('admin.dotungtuyen.store');
    Route::get('dotungtuyen/delete/{id}', [DotUngTuyenController::class, 'delete'])->name('admin.dotungtuyen.delete');
    //vị trí tuyển dụng
    Route::get('vitri/list', [ViTriController::class, 'list'])->name('admin.vitri.list');
    Route::get('vitri/edit/{id}', [ViTriController::class, 'edit'])->name('admin.vitri.edit_form');
    Route::put('vitri/edit/update/{id}', [ViTriController::class, 'update'])->name('admin.vitri.edit.update');
    Route::get('vitri/create', [ViTriController::class, 'add'])->name('admin.vitri.add_form');
    Route::post('vitri/create/store', [ViTriController::class, 'store'])->name('admin.vitri.store');
    Route::get('vitri/delete/{id}', [ViTriController::class, 'delete'])->name('admin.vitri.delete');
});
