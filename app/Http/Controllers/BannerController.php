<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    function index()
    {
        $result = Banner::orderByDesc('id')->paginate(4);
        return view('admin.banner.index')->with('banner', $result);
    }
    function them()
    {
        return view('admin.banner.them');
    }
    function luu(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data['_token']);

        $this->customValidator($data);

        $file = $request->file('hinhanh');
        if ($file != null) {
            $filename = $file->hashName();
            $file->storeAs('/public', $filename);
            $data['hinhanh'] = $filename;
        }

        $bn = Banner::updateOrCreate(['id' => $id], $data);
        $bn->save();

        if ($id == null) {
            $action = 'Thêm';
        } else {
            $action = 'Cập nhật';
        }

        return redirect()->route('banner.danhsach')->with('message', $action . ' dữ liệu thành công!');
    }
    function sua($id = null)
    {
        $data = Banner::findOrFail($id);
        return view('admin.banner.sua')->with('banner', $data);
    }
    function xoa($id = null)
    {
        Banner::destroy($id);
        return back()->with('success', 'Xóa thành công');
    }
    public function customValidator($dt)
    {
        $rules = [
            'ten' => 'required',
            'hinhanh' => 'file'
        ];
        $fields = [
            'ten' => 'Tên banner',
            'hinhanh' => 'Hình ảnh'
        ];
        $validator = Validator::make($dt, $rules, [], $fields);
        $validator->validate();
    }
}
