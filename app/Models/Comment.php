<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function khachhang()
    {
        return $this->hasOne(KhachHang::class, 'id', 'khachhang_id');
    }
    public function sanpham()
    {
        return $this->hasOne(SanPham::class, 'id', 'sanpham_id');
    }
}
