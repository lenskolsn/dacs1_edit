<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\HinhAnh;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SanPhamController extends Controller
{
    public function index()
    {
        $result = SanPham::orderbydesc('id')->search()->paginate(4);
        // foreach($result as $sp){
        //     if($sp->soluong == 0){
        //         $sp->trangthai == 1;    
        //     }
        // }   
        return view('admin.sanpham.index')->with('sanpham', $result);
    }
    public function them()
    {
        return view('admin.sanpham.them');
    }
    public function luu(Request $request, $id = null)
    {

        $data = $request->all();
        unset($data['_token']);
        unset($data['anhmota']);
        // Validator
        $this->customValidator($data);

        // Kiểm tra thêm hay cập nhật
        if ($id == null) {
            $action = 'Thêm';
        } else {
            $action = 'Cập nhật';
        }

        // Ảnh mặc định
        $file = $request->file('hinhanh');
        if (!empty($file)) {
            $filename = $file->hashName();
            $file->storeAs('/public', $filename);
            $data['hinhanh'] = $filename;
        }

        $sanpham = SanPham::updateOrCreate(['id' => $id], $data);
        $sanpham->save();

        return back()->with('message', $action . ' dữ liệu thành công!');
    }
    public function sua($id = null)
    {
        $data = SanPham::findOrFail($id);
        $danhmuc = DanhMuc::all();
        return view('admin.sanpham.sua')->with('sanpham', $data, 'danhmuc', $danhmuc);
    }
    public function xoa($id = null)
    {
        $sanpham = SanPham::findOrFail($id);
        if ($sanpham['chitietdonhang'] != null) {
            return back()->with('error', 'Không thể xóa sản phẩm có trong đơn hàng!');
        } else {
            foreach ($sanpham->comment as $cm) {
                $cm->delete();
            }
            SanPham::destroy($id);
            return back()->with('success', 'Xóa sản phẩm thành công!');
        }
    }
    public function chitiet($id = null)
    {
        $data = SanPham::findOrFail($id);
        return view('admin.sanpham.chitiet')->with('sanpham', $data);
    }
    public function customValidator($data)
    {

        $rules = [
            'tensanpham' => 'required| max:50',
            'hinhanh' => 'file',
            'mau' => 'required',
            'soluong' => 'required|numeric| min:1',
            'size' => 'required',
            'gia' => 'required| numeric |max:99999999|min:1',
            'id_danhmuc' => 'required',
            // 'mota' => 'required|max:255',
        ];

        $fields = [
            'tensanpham' => 'Tên sản phẩm',
            'hinhanh' => 'Hình ảnh',
            'soluong' => 'Số lượng',
            'mau' => 'Màu',
            'size' => 'Size',
            'gia' => 'Giá',
            'id_danhmuc' => 'Danh mục',
            // 'mota' => 'Mô tả',
        ];
        $validator = Validator::make($data, $rules, [], $fields);
        $validator->validate();
    }
}
