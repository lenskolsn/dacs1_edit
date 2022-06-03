<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DanhMucBaiVietController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
// Trang chủ (client)
Route::get('/', [HomeController::class, 'index'])->name('trangchu');
// Trang giới thiệu website
Route::get('/gioithieu', [HomeController::class, 'gioithieu'])->name('gioithieu');
// Trang xem chi tiết sản phẩm
Route::get('/chitiet/{id?}', [HomeController::class, 'chitiet'])->name('xemchitiet');
// Trang sản phẩm theo danh mục
Route::get('/danhmuc/{id?}', [HomeController::class, 'danhmucsanpham'])->name('sp_theo_dm');
// Trang sản phẩm
Route::get('/sanpham', [HomeController::class, 'sanpham'])->name('sanpham');
// Post comment
Route::post('binhluan/{sanpham_id?}', [CommentController::class, 'luu'])->name('binhluan');
// Xóa comment
Route::get('xoabinhluan/{id?}', [CommentController::class, 'xoabinhluan'])->name('xoabinhluan');
// Group blog
Route::prefix('blog')->group(function () {
    Route::get('/', [HomeController::class, 'blog'])->name('blog');
    Route::get('/chitiet/{id?}', [HomeController::class, 'blog_chitiet'])->name('blog.chitiet');
    Route::get('/danhmuc/{id?}', [HomeController::class, 'danhmucblog'])->name('blog.danhmucblog');
});
// Group admin
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dangnhap'])->name('nhanvien.dangnhap');
    Route::post('/', [UserController::class, 'luudangnhap'])->name('nhanvien.post_dangnhap');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('auth');
    Route::get('/dangky', [AdminController::class, 'dangky'])->name('nhanvien.dangky');
    Route::post('/dangky', [UserController::class, 'luudangky'])->name('nhanvien.post_dangky');
    Route::get('/dangxuat', [UserController::class, 'dangxuat'])->name('nhanvien.dangxuat')->middleware('auth');

    include 'sanpham.php'; // include san pham (routes)
    include 'danhmuc.php'; // include danh muc (routes)
    include 'banner.php'; // include banner (routes)
    include 'user.php'; // include user (routes)
    include 'khachhang.php'; // include khachhang (routes)
    include 'donhang.php'; // include donhang (routes)
    // Group Comment
    Route::prefix('comment')->group(function () {
        Route::get('/', [CommentController::class, 'index'])->name('comment.danhsach');
        Route::get('/sua/{id?}', [CommentController::class, 'sua'])->name('comment.sua');
        Route::post('/luu/{id?}', [CommentController::class, 'post_sua'])->name('comment.luu');
        Route::get('/xoa/{id?}', [CommentController::class, 'xoa'])->name('comment.xoa');
    });
    // Group post
    Route::prefix('post')->group(function () {
        Route::get('/', [PostsController::class, 'index'])->name('post.danhsach');
        Route::get('/them', [PostsController::class, 'them'])->name('post.them');
        Route::post('/luu/{id?}', [PostsController::class, 'luu'])->name('post.luu');
        Route::get('/sua/{id?}', [PostsController::class, 'sua'])->name('post.sua');
        Route::get('/xoa/{id?}', [PostsController::class, 'xoa'])->name('post.xoa');
        Route::get('/chitiet/{id?}', [PostsController::class, 'chitiet'])->name('post.chitiet');
    });
    // Group danh mục bài viết
    Route::prefix('danhmucbaiviet')->group(function () {
        Route::get('/', [DanhMucBaiVietController::class, 'index'])->name('danhmucbaiviet.danhsach');
        Route::post('/luu/{id?}', [DanhMucBaiVietController::class, 'luu'])->name('danhmucbaiviet.luu');
        Route::get('/sua/{id?}', [DanhMucBaiVietController::class, 'sua'])->name('danhmucbaiviet.sua');
        Route::get('/xoa/{id?}', [DanhMucBaiVietController::class, 'xoa'])->name('danhmucbaiviet.xoa');
    });
});
// Group tài khoản
Route::prefix('taikhoan')->group(function () {
    // Trang thông tin khách hàng
    Route::get('/thongtin', [KhachHangController::class, 'info'])->name('khachhang.info')->middleware('kh');
    // Cập nhật avatar
    Route::post('/thongtin/{id?}', [KhachHangController::class, 'capnhat_avatar'])->name('khachhang.capnhat_avatar');
    // Dang ky khach hang
    Route::get('/dangky', [KhachHangController::class, 'dangky'])->name('khachhang.dangky');
    // post dang ky khach hang
    Route::post('/dangky', [KhachHangController::class, 'luudangky'])->name('khachhang.post_dangky');
    // Dang nhap khach hang
    Route::get('/dangnhap', [KhachHangController::class, 'dangnhap'])->name('khachhang.dangnhap');
    // Post dang nhap khach hang
    Route::post('/dangnhap', [KhachHangController::class, 'luudangnhap'])->name('khachhang.post_dangnhap');
    // Dang xuat khach hang
    Route::get('/dangxuat', [KhachHangController::class, 'dangxuat'])->name('khachhang.dangxuat');
    // Doi mat khau
    Route::get('/doimatkhau', [KhachHangController::class, 'doimatkhau'])->name('khachhang.doimatkhau');
    Route::post('/doimatkhau', [KhachHangController::class, 'post_doimatkhau'])->name('khachhang.post_doimatkhau');
});
// Group giỏ hàng
Route::prefix('giohang')->middleware('kh')->group(function () {
    Route::get('/', [HomeController::class, 'giohang'])->name('cart.xem');
    Route::post('/them/{id}/{quantity?}', [CartController::class, 'them'])->name('cart.them');
    Route::get('/xoa/{id}', [CartController::class, 'xoa'])->name('cart.xoa');
    Route::get('/capnhat/{id}', [CartController::class, 'capnhat'])->name('cart.capnhat');
    Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
});
// Group đặt hàng
Route::prefix('dathang')->middleware('kh')->group(function () {
    Route::get('/', [DonHangController::class, 'dathang'])->name('dathang');
    Route::post('/', [DonHangController::class, 'luu_dathang'])->name('dathang');
});
