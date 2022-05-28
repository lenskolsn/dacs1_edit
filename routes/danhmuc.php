<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DanhMucController;

Route::prefix('danhmuc')->middleware('auth')->group(function () {
    Route::get('/', [DanhMucController::class, 'index'])->name('danhmuc.danhsach');
    Route::get('/them/{id?}', [DanhMucController::class, 'them'])->name('danhmuc.them');
    Route::post('/luu/{id?}', [DanhMucController::class, 'luu'])->name('danhmuc.luu');
    Route::get('/sua/{id?}', [DanhMucController::class, 'sua'])->name('danhmuc.sua');
    Route::get('/xoa/{id?}', [DanhMucController::class, 'xoa'])->name('danhmuc.xoa');
    Route::get('/chitiet/{id?}', [DanhMucController::class, 'chitiet'])->name('danhmuc.chitiet');
});
