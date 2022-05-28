<?php

namespace App\Http\Controllers;

use App\Helper\CartHelper;
use App\Models\ChiTietDatHang;
use App\Models\ChiTietDonHang;
use App\Models\DatHang;
use App\Models\DonHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DonHangController extends Controller
{
    function dathang()
    {
        return view('dathang');
    }
    function index()
    {
        $donhang = DonHang::all();
        return view('admin.donhang.index', compact('donhang'));
    }
    function chitiet($id = null)
    {
        // Chi tiết đơn hàng có id_donhang = id DonHang
        $donhang = ChiTietDonHang::all()->where('id_donhang', $id);
        // $donhang = ChiTietDonHang::findOrFail($id);
        return view('admin.donhang.chitiet', compact('donhang'));
    }
    function luu_dathang(Request $request, CartHelper $cart)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required',
            'diachi' => 'required',
            'phone' => 'required|numeric',
        ], [], [
            'name' => 'Họ tên',
            'email' => 'Email',
            'diachi' => 'Địa chỉ',
            'phone' => 'Số điện thoại',
        ]);
        $validator->validate();

        $id_khachhang = Auth::guard('khach_hangs')->user()->id;

        $donhang = DonHang::create([
            'tenkhachhang' => $request->name,
            'id_khachhang' => $id_khachhang,
            'ghichu' => $request->ghichu,
            'diachi' => $request->diachi,
            'tongtien' => $cart->total_price,
        ]);

        if ($donhang) {
            $id_honhang = $donhang->id;
            foreach ($cart->items as $item) {
                $quantity = $item['quantity'];
                $gia = $item['gia'];
                ChiTietDonHang::create([
                    'id_donhang' => $id_honhang,
                    'id_sanpham' => $item['id'],
                    'gia' => $gia,
                    'quantity' => $quantity
                ]);
            }
            session(['cart' => []]);
            return back()->with('success', 'Đặt hàng thành công!');
        } else {
            return back()->with('error', 'Đặt hàng thất bại!');
        }
    }
    function xoa($id = null)
    {
        ChiTietDonHang::where('id_donhang', $id)->delete();
        DonHang::destroy($id);
        return back()->with('message', 'Xóa đơn hàng thành công!');
    }
}
