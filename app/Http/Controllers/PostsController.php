<?php

namespace App\Http\Controllers;

use App\Models\DanhMucBaiViet;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    function index()
    {
        $posts = Posts::all();
        return view('admin.post.index', compact('posts'));
    }
    function them()
    {
        $danhmucbaiviet = DanhMucBaiViet::all();
        return view('admin.post.them', compact('danhmucbaiviet'));
    }
    function luu(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data['_token']);

        $rules = [
            'id_danhmuc' => 'required',
            'tieude' => 'required',
            'hinhanh' => 'required',
            'mota' => 'required',
            'noidung' => 'required',
        ];

        $fields = [
            'id_danhmuc' => 'Danh mục bài viết',
            'tieude' => 'Tiêu đề',
            'hinhanh' => 'Hình ảnh',
            'mota' => 'Mô tả',
            'noidung' => 'Nội dung',
        ];
        $validator = Validator::make($data, $rules, [], $fields);
        $validator->validate();

        // Lấy id User
        $data['id_tacgia']  = Auth::user()->id;
        $data['tongluotxem']  = $data['tongluotxem'] ?? 0;

        $file = $request->file('hinhanh');
        if ($file != null) {
            $filename = $file->hashName();
            $file->storeAs('/public/post', $filename);
            $data['hinhanh'] = $filename;
        }

        if ($id == null) {
            $action = 'Thêm';
        } else {
            $action = 'Cập nhật';
        }

        $post = Posts::updateOrCreate(['id' => $id], $data);
        $post->save();

        return redirect()->route('post.danhsach')->with('message', $action . ' dữ liệu thành công!');
    }
    function sua($id = null)
    {
        $post = Posts::findOrFail($id);
        $danhmucbaiviet = DanhMucBaiViet::all();
        return view('admin.post.sua', compact('post', 'danhmucbaiviet'));
    }
    function xoa($id = null)
    {
        Posts::destroy($id);
        return back()->with('message', 'Xóa bài viết thành công!');
    }
    function chitiet($id = null)
    {
        $post = Posts::findOrFail($id);
        return view('admin.post.chitiet', compact('post'));
    }
}
