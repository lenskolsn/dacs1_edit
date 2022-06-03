<?php

use App\Http\Controllers\DonHangController;
use Illuminate\Support\Facades\Route;

Route::prefix('donhang')->middleware('auth')->group(function () {
  Route::get('/', [DonHangController::class, 'index'])->name('donhang.danhsach');
  Route::get('/chitiet/{id?}', [DonHangController::class, 'chitiet'])->name('donhang.chitiet');
  Route::get('/xoa/{id?}', [DonHangController::class, 'xoa'])->name('donhang.xoa');
  Route::get('/sua/{id?}', [DonHangController::class, 'sua'])->name('donhang.sua');
  Route::post('/luu/{id?}', [DonHangController::class, 'luu'])->name('donhang.luu');
});
