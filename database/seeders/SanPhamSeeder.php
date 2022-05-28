<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // áo sơ mi
            [
                'tensanpham' => "ÁO SƠ MI LOOSE ASM091 MÀU XANH ĐEN",
                'hinhanh' => 'oPsCHH7wxQY2g6nwhZeinUjqJikZZTDVekMWQqTD.jpg',
                'id_danhmuc' => '3',
                'gia' => '210000',
                'mota' => 'Sản phẩm nổi bật',
                'created_at' => '2022-03-28 00:00:00'
            ],
            [
                'tensanpham' => "ÁO SƠ MI TRƠN SLIMFIT ASM079 MÀU ĐEN",
                'hinhanh' => 'Opfazi2Zy0Gs9EXbk5efccRXGEi2AdsxgP3IKNuF.jpg',
                'id_danhmuc' => '3',
                'gia' => '210000',
                'mota' => 'Sản phẩm nổi bật',
                'created_at' => '2022-03-28 00:00:00'
            ],
            // áo khoác
            [
                'tensanpham' => "ÁO KHOÁC DÙ RÃ NGANG AK027 MÀU XÁM",
                'hinhanh' => 'pVdo8o06JbrsJ3EDg8HzCzXR7ULd1D4X7jdjiiTL.jpg',
                'id_danhmuc' => '4',
                'gia' => '300000',
                'mota' => 'Sản phẩm nổi bật',
                'created_at' => '2022-03-28 00:00:00'
            ],
            [
                'tensanpham' => "ÁO KHOÁC REGULAR AK026 MÀU ĐEN",
                'hinhanh' => 'H5RilWLoxaVnMoB0D0amNUeasSc5AhyY09nz0iqu.jpg',
                'id_danhmuc' => '4',
                'gia' => '300000',
                'mota' => 'Sản phẩm nổi bật',
                'created_at' => '2022-03-28 00:00:00'
            ],
            // áo vest
            [
                'tensanpham' => "ÁO VEST TRƠN REGULAR AV003 MÀU NÂU",
                'hinhanh' => 'UVY6FwubxFL7oWj2wQjgHNJ7ACZIagpAMLr0fN1m.jpg',
                'id_danhmuc' => '2',
                'gia' => '985000',
                'mota' => 'Sản phẩm nổi bật',
                'created_at' => '2022-03-28 00:00:00'
            ],
            [
                'tensanpham' => "ÁO VEST TRƠN REGULAR AV002 MÀU KEM",
                'hinhanh' => '7UmSxhKU7ET82OsF11ox1Rdv7pWsNCNOZ5BtBii1.jpg',
                'id_danhmuc' => '2',
                'gia' => '985000',
                'mota' => 'Sản phẩm nổi bật',
                'created_at' => '2022-03-28 00:00:00'
            ],
            [
                'tensanpham' => "Áo There Is No One At All",
                'hinhanh' => 'hC6tdMwLoBmyJ0RJFtqzzXNp6udVunYdtZyp1znX.png',
                'id_danhmuc' => '1',
                'gia' => '600000',
                'mota' => 'Áo phông 3158',
                'created_at' => '2022-03-28 00:00:00'
            ],
            [
                'tensanpham' => "ÁO THUN REGULAR ENERGY MÀU TRẮNG",
                'hinhanh' => 'Iq81lTbAx2Dhh1tyaLMl79c5nZTDTnc4ifAqtnPj.jpg',
                'id_danhmuc' => '1',
                'gia' => '275000',
                'mota' => '',
                'created_at' => '2022-03-28 00:00:00'
            ],
            [
                'tensanpham' => "ÁO THUN IN KICK BACK MÀU ĐEN",
                'hinhanh' => 'cC6EKFjQqslHwmoW2huBFgt4GXV6HBr6atH31hpR.jpg',
                'id_danhmuc' => '1',
                'gia' => '275000',
                'mota' => '',
                'created_at' => '2022-03-28 00:00:00'
            ]
        ];
        DB::table('san_phams')->insert($data);
    }
}
