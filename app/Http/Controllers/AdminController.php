<?php

namespace App\Http\Controllers;

use App\Helper\CartHelper;
use App\Models\Banner;
use App\Models\Comment;
use App\Models\DanhMuc;
use App\Models\DonHang;
use App\Models\KhachHang;
use App\Models\Posts;
use App\Models\SanPham;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function dangnhap(){
        return view('admin.dangnhap');
    }
    function dangky()
    {
        return view('admin.dangky');
    }
    function dashboard(){
        $sp = SanPham::count();
        $dm = DanhMuc::count();
        $nv = User::count();
        $kh = KhachHang::count();
        $dh = DonHang::count();
        $bn = Banner::count();
        $bv = Posts::count();
        $cm = Comment::count();
        return view('admin.dashboard',compact('sp','dm','nv','kh','dh','bn','bv','cm'));
    }
}
