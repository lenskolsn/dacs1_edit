<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMucBaiViet extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function posts(){
        return $this->hasMany(Posts::class, 'id_danhmuc','id');
    }
}
