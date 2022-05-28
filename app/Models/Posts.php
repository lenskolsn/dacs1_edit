<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tacgia(){
        return $this->hasOne(User::class, 'id', 'id_tacgia');
    }
    public function danhmucbaiviet(){
        return $this->hasOne(DanhMucBaiViet::class, 'id', 'id_danhmuc');
    }
}
