<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tieude');
            $table->string('hinhanh');
            $table->string('mota');
            $table->string('tongluotxem');
            $table->text('noidung');
            $table->integer('id_danhmuc')->unsigned();
            $table->foreign('id_danhmuc')->references('id')->on('danh_muc_bai_viets');
            $table->integer('id_tacgia')->unsigned();
            $table->foreign('id_tacgia')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
