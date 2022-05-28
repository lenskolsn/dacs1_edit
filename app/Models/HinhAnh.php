<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sanpham(){
        return $this->hasOne(SanPham::class, 'id', 'id_sanpham');
    }
}
