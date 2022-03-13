<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('kn_nama', 100);
            $table->string('kn_warna', 20);
            $table->integer('kn_harga');
//            $table->foreign('id_kendaraan')->references('id')->on('motors');
//            $table->foreignId('id_kendaraan')->nullable();
//            $table->integer('type_kendaraan');
            $table->integer('kendaraanable_id');
            $table->string('kendaraanable_type');
            $table->timestamps();

//            $table->foreign('user_id')->references('id')->on('users');

            // $table->foreign('id_kendaraan')->references('id')->on('mobils');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kendaraans');
    }
}
