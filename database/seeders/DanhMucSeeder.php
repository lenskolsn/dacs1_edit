<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('danh_mucs')->insert([
            ['tendanhmuc'=>'Áo Thun', 'trangthai'=>'1'],
            ['tendanhmuc'=>'Áo Vest', 'trangthai'=>'1'],
            ['tendanhmuc'=>'Áo Sơ mi', 'trangthai'=>'1'],
            ['tendanhmuc'=>'Áo Khoác', 'trangthai'=>'1'],
            ['tendanhmuc'=>'Sản phẩm mới', 'trangthai'=>'1'],
            ['tendanhmuc'=>'Sản phẩm nổi bật', 'trangthai'=>'1'],
        ]);
    }
}
