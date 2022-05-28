<?php

use App\Http\Controllers\KhachHangController;
use Illuminate\Support\Facades\Route;

Route::prefix('khachhang')->middleware('auth')->group(function(){
  Route::get('/',[KhachHangController::class,'index'])->name('khachhang.danhsach');
  Route::get('/them',[KhachHangController::class,'them'])->name('khachhang.them');
  Route::get('/sua/{id?}',[KhachHangController::class,'sua'])->name('khachhang.sua');
  Route::post('/sua/{id?}',[KhachHangController::class,'update'])->name('khachhang.post_sua');
  Route::get('/xoa/{id?}',[KhachHangController::class,'xoa'])->name('khachhang.xoa');
  Route::get('/chitiet/{id?}',[KhachHangController::class,'chitiet'])->name('khachhang.chitiet');
});