<?php

namespace App\Http\Controllers;

use App\Models\DanhMucBaiViet;
use Database\Seeders\DanhMucSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DanhMucBaiVietController extends Controller
{
    function index()
    {
        $danhmucbaiviet = DanhMucBaiViet::orderByDesc('id')->get();
        return view('admin.danhmucbaiviet.index', compact('danhmucbaiviet'));
    }
    function luu(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data['_token']);
        $validator = Validator::make($data, ['tendanhmuc' => 'required|min:4'], [], ['tendanhmuc' => 'Tên danh mục']);
        $validator->validate();

        if ($id == null) {
            $action = 'Thêm';
        } else {
            $action = 'Cập nhật';
        }

        $danhmucbaiviet = DanhMucBaiViet::updateOrCreate(['id' => $id], $data);
        $danhmucbaiviet->save();

        return redirect()->route('danhmucbaiviet.danhsach')->with('message', $action . ' dữ liệu thành công!');
    }
    function sua($id = null)
    {
        $danhmucbaiviet = DanhMucBaiViet::findOrFail($id);
        return view('admin.danhmucbaiviet.sua', compact('danhmucbaiviet'));
    }
    function xoa($id = null)
    {
        $danhmucbaiviet = DanhMucBaiViet::findOrFail($id);

        if ($danhmucbaiviet->posts->count() > 0) {
            return back()->with('error', 'Không thể xóa danh mục có bài viết!');
        } else {
            DanhMucBaiViet::destroy($id);
            return back()->with('success', 'Xóa danh mục thành công!');
        }
    }
}
