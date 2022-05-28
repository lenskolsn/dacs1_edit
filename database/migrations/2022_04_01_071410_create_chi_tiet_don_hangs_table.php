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
        Schema::create('chi_tiet_don_hangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_donhang')->unsigned();
            $table->integer('id_sanpham')->unsigned();
            $table->string('gia')->nullable();
            $table->string('quantity')->nullable();
            $table->foreign('id_donhang')->references('id')->on('don_hangs');
            $table->foreign('id_sanpham')->references('id')->on('san_phams');
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
        Schema::dropIfExists('chi_tiet_don_hangs');
    }
};
