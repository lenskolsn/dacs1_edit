<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DanhMucController extends Controller
{
    function index()
    {
        $result = DanhMuc::orderByDesc('id')->paginate(5);
        return view('admin.danhmuc.index')->with('danhmuc', $result);
    }

    function luu(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data['_token']);

        $validator = Validator::make($data, ['tendanhmuc' => 'required'], [], ['tendanhmuc' => 'Tên danh mục']);
        $validator->validate();

        $dm = DanhMuc::updateOrCreate(['id' => $id], $data);
        $dm->save();

        if ($id == null) {
            $action = 'Thêm';
        } else {
            $action = 'Cập nhật';
        }

        return redirect()->route('danhmuc.danhsach')->with('message', $action . ' dữ liệu thành công!');
    }
    function sua($id = null)
    {
        $data = DanhMuc::findOrFail($id);
        return view('admin.danhmuc.sua')->with('danhmuc', $data);
    }
    function xoa($id = null)
    {
        $danhmuc = DanhMuc::findOrFail($id);
        // Nếu danh mục có sản phẩm thì k được xóa
        if ($danhmuc['san_phams']->count() > 0) {
            return back()->with('error', 'Không thể xóa danh mục đã có sản phẩm!');
        } else {
            DanhMuc::destroy($id);
            return back()->with('success', 'Xóa danh mục thành công!');
        }
    }
}
