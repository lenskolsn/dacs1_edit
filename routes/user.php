<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('nhanvien')->middleware('auth')->group(function () {
  Route::get('/', [UserController::class, 'index'])->name('nhanvien.danhsach')->middleware('auth', 'admin');
  Route::post('/info/{id?}', [UserController::class, 'capnhat_avatar_user'])->name('nhanvien.capnhat_avatar_nhanvien');

  Route::get('/them', [UserController::class, 'them'])->name('nhanvien.them')->middleware('auth', 'admin');

  Route::get('/sua/{id?}', [UserController::class, 'sua'])->name('nhanvien.sua')->middleware('auth', 'admin');
  Route::post('/sua/{id?}', [UserController::class, 'post_sua'])->name('nhanvien.post_sua');
  
  Route::get('/info', [UserController::class, 'info_nhanvien'])->name('nhanvien.info');

  Route::get('/chitiet/{id?}', [UserController::class, 'chitiet'])->name('nhanvien.chitiet');

  Route::get('/xoa/{id?}', [UserController::class, 'xoa'])->name('nhanvien.xoa');
});
