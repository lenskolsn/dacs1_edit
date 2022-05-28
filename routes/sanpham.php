<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamController;

Route::prefix('sanpham')->middleware('auth')->group(function () {
    Route::get('/', [SanPhamController::class, 'index'])->name('sanpham.danhsach');

    Route::get('/them/{id?}', [SanPhamController::class, 'them'])->name('sanpham.them');
    Route::post('/luu/{id?}', [SanPhamController::class, 'luu'])->name('sanpham.luu');
    Route::get('/sua/{id?}', [SanPhamController::class, 'sua'])->name('sanpham.sua');
    Route::get('/xoa/{id?}', [SanPhamController::class, 'xoa'])->name('sanpham.xoa');
    Route::get('/chitiet/{id?}', [SanPhamController::class, 'chitiet'])->name('sanpham.chitiet');
});
