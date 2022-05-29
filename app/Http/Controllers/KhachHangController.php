<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\Comment;
use App\Models\DonHang;
use App\Models\KhachHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class KhachHangController extends Controller
{
    // Danh sách
    public function index()
    {
        $khachhang = KhachHang::all();
        return view('admin.khachhang.index', compact('khachhang'));
    }
    // Thông tin khách hàng
    public function info()
    {
        $id_khachhang = Auth::guard('khach_hangs')->user()->id;
        $donhang = DonHang::where('id_khachhang', $id_khachhang)->get();
        $chitietdonhang = ChiTietDonHang::all();
        $sanpham = SanPham::all();
        return view('account.info', compact('donhang', 'chitietdonhang', 'sanpham'));
    }
    // Cập nhật avatar
    public function capnhat_avatar(Request $request, $id = null)
    {
        $data = $request->all();

        $validator = Validator::make($data, ['avatar' => 'required']);
        $validator->validate();

        $file = $request->file('avatar');
        if ($file != null) {
            $filename = $file->hashName();
            $file->storeAs('/public/avatars', $filename);
            $data['avatar'] = $filename;
        }

        $khachhang = KhachHang::updateOrCreate(['id' => $id], $data);
        $khachhang->save();

        return back()->with('success', 'Cập nhật avatar thành công! ');
    }


    // Thêm khách hàng
    public function them()
    {
        return view('admin.khachhang.them');
    }
    // Sửa khách hàng
    public function sua($id = null)
    {
        $khachhang = KhachHang::findOrFail($id);
        return view('admin.khachhang.sua', compact('khachhang'));
    }
    // Xóa khách hàng
    public function xoa($id = null)
    {
        $khachhang = KhachHang::findOrFail($id);
        foreach ($khachhang->comment as $cm) {
            $cm->delete(); 
        }
        KhachHang::destroy($id);
        return back()->with('success', 'Xóa thành công!');
    }
    // Chi tiết khách hàng
    public function chitiet($id = null)
    {
        $khachhang = KhachHang::findOrFail($id);
        return view('admin.khachhang.chitiet', compact('khachhang'));
    }
    // 
    public function update(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data['_token']);

        $rules = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ];
        $fields = [
            'name' => 'Họ tên',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
        ];
        $validator = Validator::make($data, $rules, [], $fields);
        $validator->validate();

        $khachhang = KhachHang::updateOrCreate(['id' => $id], $data);
        $khachhang->password = Hash::make($khachhang->password);
        $khachhang->save();
        return redirect()->route('khachhang.danhsach')->with('success', 'Cập nhật thành công!');
    }
    // Đăng ký khách hàng
    public function dangky()
    {
        return view('account.dangky');
    }
    // Đăng nhập khách hàng
    public function dangnhap()
    {
        return view('account.dangnhap');
    }
    // Post đăng ký
    public function luudangky(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data['_token']);

        $rules = [
            'name' => 'required',
            'email' => 'required|unique:khach_hangs|email',
            'phone' => 'required|numeric',
            'password' => 'required| min:5',
            'confirm_password' => 'required| same:password'
        ];
        $fields = [
            'name' => 'Họ tên',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'password' => 'Mật khẩu',
            'confirm_password' => 'Mật khẩu nhập lại'
        ];

        $validator = Validator::make($data, $rules, [], $fields);
        $validator->validate();

        unset($data['confirm_password']); // Bỏ cột nhập lại mật khẩu vì trong database k có 

        // $data = new KhachHang();

        $file = $request->file('avatar');
        if ($file != null) {
            $filename = $file->hashName();
            $file->storeAs('/public/avatars', $filename);
            $data['avatar'] = $filename;
        }

        $khachhang = KhachHang::updateOrCreate($data);
        $khachhang->password = Hash::make($khachhang->password);
        $khachhang->save();

        return back()->with('message', 'Tạo tài khoản thành công!');
    }
    // Post Đăng nhập
    public function luudangnhap(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [], [
            'email' => 'Email',
            'password' => 'Mật khẩu'
        ]);

        if (Auth::guard('khach_hangs')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('trangchu')->with('success', 'Đăng nhập thành công!');
        }
        return back();
    }
    // Đăng xuất
    public function dangxuat(Request $request)
    {
        Auth::guard('khach_hangs')->logout();
        // $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('trangchu');
    }
}
