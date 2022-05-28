<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('khach_hangs')->insert([
            'name'=>'Nam Le',
            'email'=>'lnam6507@gmail.com',
            'password'=> Hash::make('sonnam'),
            'phone'=>'0354632349',
            'created_at'=>'2022-03-28 00:00:00'
        ]);
    }
}
