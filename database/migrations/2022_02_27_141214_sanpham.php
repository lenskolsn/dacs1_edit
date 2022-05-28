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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tensanpham')->nullable();
            $table->string('hinhanh')->nullable();
            $table->string('gia')->nullable();
            $table->string('mota')->nullable();
            $table->tinyInteger('trangthai')->default('1')->nullable();

            $table->integer('id_danhmuc')->unsigned();
            $table->foreign('id_danhmuc')->references('id')->on('danh_mucs');
            
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
        Schema::dropIfExists('san_phams');
    }
};
