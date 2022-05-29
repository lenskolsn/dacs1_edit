<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    function index()
    {
        $result = User::all();
        return view('admin.user.index')->with('user', $result);
    }
    function them()
    {
        return view('admin.user.them');
    }
    function sua($id = null)
    {
        $nhanvien = User::findOrFail($id);
        return view('admin.user.sua', compact('nhanvien'));
    }
    function post_sua(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);

        $rules = [
            'name' => 'required',
            'email' => 'required',
        ];
        $fields = [
            'name' => 'Họ tên',
            'email' => 'Email',
        ];
        $validator = Validator::make($data, $rules, [], $fields);
        $validator->validate();

        $nhanvien = User::updateOrCreate(['id' => $id], $data);
        $nhanvien->password = Hash::make($nhanvien->password);

        $nhanvien->save();

        return redirect()->route('nhanvien.danhsach');
    }
    function info_nhanvien()
    {
        return view('admin.user.info');
    }
    function capnhat_avatar_user(Request $request, $id = null)
    {
        $data = $request->all();

        $file = $request->file('avatar');
        if ($file != null) {
            $filename = $file->hashName();
            $file->storeAs('/public/avatars', $filename);
            $data['avatar'] = $filename;
        }

        $user = User::updateOrCreate(['id' => $id], $data);
        $user->save();

        return back()->with('success', 'Cập nhật avatar thành công!');
    }
    function chitiet($id = null)
    {
        $nhanvien = User::findOrFail($id);
        return view('admin.user.chitiet', compact('nhanvien'));
    }
    function xoa($id = null)
    {
        $user = User::findOrFail($id);
        if ($user->posts->count() != null) {
            return back()->with('error', 'Không thể xóa!');
        } else {
            User::destroy($id);
            return back()->with('success', 'Xóa thành công!');
        }
    }
    function dangnhap()
    {
        return view('admin.login');
    }

    function luudangnhap(Request $request)
    {
        $userLogin = Validator::make(
            $request->all(),
            ['email' => 'required', 'password' => 'required'],
            [],
            ['email' => 'Email', 'password' => 'Mật khẩu']
        );

        $userLogin->validate();

        $userLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($userLogin)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('nhanvien.dangnhap');
        }
    }

    function luudangky(Request $request)
    {

        $data = $request->all();
        unset($data['_token']);

        $rules = [
            'name' => 'required',
            'email' => 'required| email| unique:users', // Email phải duy nhất trong bảng User
            'password' => 'required| min:4',
            'confirmPassword' => 'same:password' // confirmPassword phải giống password
        ];

        $files = [
            'name' => 'Họ tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'confirmPassword' => 'Xác nhận mật khẩu',
        ];

        $validator = Validator::make($data, $rules, [], $files);
        $validator->validate();


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $request->is_admin;
        $user->password = Hash::make($request->password);

        $user->save();
        return redirect()->route('nhanvien.danhsach');
    }

    function dangxuat(Request $request)
    {
        Auth::logout();
        // $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('nhanvien.dangnhap');
    }
}
