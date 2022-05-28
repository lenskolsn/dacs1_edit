<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function san_phams(){
        return $this->hasMany(SanPham::class, 'id_danhmuc','id');
    }
}
