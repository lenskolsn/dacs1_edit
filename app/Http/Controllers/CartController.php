<?php

namespace App\Http\Controllers;

use App\Helper\CartHelper;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    function them(CartHelper $cart, $id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mau' => 'required',
            'size' => 'required',
        ], [], [
            'mau' => 'Màu',
            'size' => 'Size',
        ])->validate();

        $product = SanPham::findOrFail($id);
        $product->mau = $request->mau;
        $product->size = $request->size;
        dd($cart);
        $cart->add($product);
        return redirect()->back()->with('message', 'Thêm vào giỏ hàng thành công!');
    }
    function xoa(CartHelper $cart, $id)
    {
        $cart->remove($id);
        return redirect()->back();
    }
    function capnhat(CartHelper $cart, $id, Request $request)
    {
        $data = $request->all();
        $id_sanpham = $cart->items[$id]['id'];
        $sanpham = SanPham::find($id_sanpham);
        $soluongsanpham = $sanpham->soluong;

        $validator = Validator::make($data, [
            'quantity' => 'required| numeric|' . 'max:' . $soluongsanpham
        ], [], [
            'quantity' => 'Số lượng'
        ])->validate();

        $quantity = request()->quantity ? request()->quantity : 1;
        $cart->update($id, $quantity);
        return back()->with('success', 'Cập nhật số lượng thành công!');
    }
    function clear(CartHelper $cart)
    {
        $cart->clear();
        return redirect()->back();
    }
}
