<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;

Route::prefix('banner')->middleware('auth')->group(function () {
    Route::get('/', [BannerController::class, 'index'])->name('banner.danhsach');
    Route::get('/them/{id?}', [BannerController::class, 'them'])->name('banner.them');
    Route::post('/luu/{id?}', [BannerController::class, 'luu'])->name('banner.luu');
    Route::get('/sua/{id?}', [BannerController::class, 'sua'])->name('banner.sua');
    Route::get('/xoa/{id?}', [BannerController::class, 'xoa'])->name('banner.xoa');
    Route::get('/chitiet/{id?}', [BannerController::class, 'chitiet'])->name('banner.chitiet');
});
