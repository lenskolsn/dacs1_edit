<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    function index()
    {
        $comment = Comment::orderByDesc('id')->get();
        return view('admin.comment.index', compact('comment'));
    }
    function luu(Request $request, $sanpham_id)
    {
        $data = $request->all();
        unset($data['_token']);

        // Validator
        $validator = Validator::make($data, ['noidung' => 'required| min:2'], [], ['noidung' => 'Nội dung']);
        $validator->validate();

        if (Auth::guard('khach_hangs')->check()) {
            // Lấy id khách hàng
            $data['khachhang_id'] = Auth::guard('khach_hangs')->user()->id;
            // Lấy id sản phẩm
            $data['sanpham_id'] = $sanpham_id;
            $comment = Comment::updateOrCreate($data);
            $comment->save();
            return back();
        } else {
            return back()->with('error', ' để comment');
        }
    }
    function xoabinhluan($id = null)
    {
        Comment::destroy($id);
        return back();
    }
    function sua($id = null)
    {
        $comment = Comment::findOrFail($id);
        return view('admin.comment.sua', compact('comment'));
    }
    function post_sua(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data['_token']);
        $cm = Comment::updateOrCreate(['id' => $id], $data);
        $cm->save();
        return redirect()->route('comment.danhsach')->with('message', 'Cập nhật dữ liệu thành công!');
    }
    function xoa($id = null)
    {
        Comment::destroy($id);
        return back()->with('message', 'Xóa comment thành công!');
    }
}
