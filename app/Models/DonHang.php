<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function khach_hangs(){
        return $this->hasOne(KhachHang::class,'id','id_khachhang');
    }
}
