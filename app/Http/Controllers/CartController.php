<?php

namespace App\Http\Controllers;

use App\Helper\CartHelper;
use App\Models\SanPham;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function them(CartHelper $cart, $id)
    {
        $product = SanPham::findOrFail($id);
        $cart->add($product);
        return redirect()->back();
    }
    function xoa(CartHelper $cart, $id)
    {
        $cart->remove($id);
        return redirect()->back();
    }
    function capnhat(CartHelper $cart, $id)
    {
        $quantity = request()->quantity ? request()->quantity : 1;
        $cart->update($id, $quantity);
        return redirect()->back();
    }
    function clear(CartHelper $cart)
    {
        $cart->clear();
        return redirect()->back();
    }
}
