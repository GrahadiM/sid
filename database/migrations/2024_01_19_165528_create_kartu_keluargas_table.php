<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKartuKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartu_keluargas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penduduk_id');
            $table->string('no')->comment('No Kartu Keluarga');
            $table->string('desa')->default('Aek Nabara');
            $table->string('dusun')->default('Dusun 1');
            $table->string('kec')->default('Simangumban');
            $table->string('kab')->default('Tapanuli Utara');
            $table->string('prov')->default('Sumatera Utara');
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
        Schema::dropIfExists('kartu_keluargas');
    }
}
