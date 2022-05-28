<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\DanhMuc;
use App\Models\DanhMucBaiViet;
use App\Models\SanPham;
use App\Models\KhachHang;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Tìm sản phẩm theo giá và danh mục
        // $from = $request->input('from');
        // $to = $request->input('to');
        // $id_danhmuc = $request->input('id_danhmuc');

        if ($key = $request->key) {
            $sanpham = SanPham::where('tensanpham', 'like', '%' . $key . '%')->get();
            $soluong = count($sanpham);
            return view('trangtimkiem', compact('sanpham', 'soluong'));
        }

        $sanpham = SanPham::orderByDesc('id')->get();
        $spbanchay = SanPham::paginate(3);
        // if ($from) {
        //     $query->where('gia', '>=', $from);
        // }
        // if ($to) {
        //     $query->where('gia', '<=', $to);
        // }
        // if ($id_danhmuc) {
        //     $query->where('id_danhmuc', $id_danhmuc);
        // }
        // // Sản phẩm mới
        // $sanphammoi = $query->get();
        return view('home', compact('sanpham', 'spbanchay'));
    }
    public function gioithieu()
    {
        return view('gioithieu');
    }
    public function chitiet($id = null)
    {
        // Chi tiết sản phẩm theo id
        $sanpham = SanPham::findOrFail($id);
        $comment = Comment::orderByDesc('id')->where('sanpham_id', $id)->get();
        $khachhang = KhachHang::all();
        return view('chitiet', compact('sanpham', 'comment', 'khachhang'));
    }
    public function danhmucsanpham($id = null)
    {
        // Lấy sản phẩm theo danh mục
        $sanpham = SanPham::where('id_danhmuc', '=', $id)->get();
        // Lấy tên danh mục
        $dm = DanhMuc::findorfail($id);
        return view('danhmucsanpham', compact("sanpham", 'dm'));
    }
    function sanpham()
    {
        $sanpham = SanPham::all();
        return view('sanpham', compact('sanpham'));
    }
    public function giohang()
    {
        return view('giohang');
    }
    function blog()
    {
        $blog = Posts::all();
        $blog_new = Posts::orderByDesc('id')->get();
        $danhmucbaiviet = DanhMucBaiViet::all();
        return view('blog.index', compact('blog', 'blog_new', 'danhmucbaiviet'));
    }
    function blog_chitiet($id = null)
    {
        $blog = Posts::findOrFail($id);
        $blog_new = Posts::orderByDesc('id')->get();
        $danhmucbaiviet = DanhMucBaiViet::all();
        if (Auth::guard('khach_hangs')->check()) {
            DB::table('posts')->where('id',$blog->id)->increment('tongluotxem');
        }
        return view('blog.chitiet', compact('blog', 'blog_new', 'danhmucbaiviet'));
    }
}
