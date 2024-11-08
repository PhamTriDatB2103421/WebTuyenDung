<?php

use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\DotUngTuyenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NopDonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViTriController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('index');
// login
Route::get('/login-a', [UserController::class, 'login_a'])->name('login');
Route::get('/login-b', [UserController::class, 'login_b'])->name('register_a');
Route::post('/auth', [UserController::class, 'auth'])->name('auth');
Route::post('/register', [UserController::class, 'register_user'])->name('register');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
//baiViet
Route::get('/baiViet/{id}', [BaiVietController::class, 'baiViet'])->name('user.baiviet');
Route::get('/baiViet/{idu}/{idbv}', [BaiVietController::class, 'nop'])->name('user.baiviet.nop');

//route
// Hiển thị hồ sơ người dùng
Route::get('/profile/{id}', [UserController::class, 'show'])->name('user.profile');

Route::get('/info_create', [UserController::class, 'concacloiquai'])->name('loivcl');
Route::post('/profile/store', [UserController::class, 'profile_store'])->name('user.profile.store');

// Chỉnh sửa hồ sơ người dùng
Route::get('/profile/{id}/edit', [UserController::class, 'profile_edit'])->name('user.profile.edit');

// Cập nhật thông tin hồ sơ người dùng
Route::post('/profile/{id}/update', [UserController::class, 'profile_update'])->name('user.profile.update');




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
    //Bài viết tuyển dụng
    Route::get('baiviet/list', [BaiVietController::class, 'list'])->name('admin.baiviet.list');
    Route::get('baiviet/edit/{id}', [BaiVietController::class, 'edit'])->name('admin.baiviet.edit_form');
    Route::put('baiviet/edit/update/{id}', [BaiVietController::class, 'update'])->name('admin.baiviet.edit.update');
    Route::get('baiviet/create', [BaiVietController::class, 'add'])->name('admin.baiviet.add_form');
    Route::post('baiviet/create/store', [BaiVietController::class, 'store'])->name('admin.baiviet.store');
    Route::get('baiviet/delete/{id}', [BaiVietController::class, 'delete'])->name('admin.baiviet.delete');
    //đơn tuyển dụng
    Route::get('donUngtuyen/list/{id}', [NopDonController::class, 'list'])->name('admin.don.list');
    Route::get('donUngtuyen/edit/{id}', [NopDonController::class, 'edit'])->name('admin.don.edit');
    Route::post('donUngtuyen/edit/update/{id}', [NopDonController::class, 'update'])->name('admin.don.update');
    Route::get('donUngtuyen/delete/{id}', [NopDonController::class, 'delete'])->name('admin.don.delete');
 });
