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
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tenkhachhang')->nullable();
            $table->string('ghichu')->nullable();
            $table->string('diachi')->nullable();
            $table->string('tongtien')->nullable();
            $table->integer('id_khachhang')->unsigned();
            $table->foreign('id_khachhang')->references('id')->on('khach_hangs');
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
        Schema::dropIfExists('don_hangs');
    }
};
