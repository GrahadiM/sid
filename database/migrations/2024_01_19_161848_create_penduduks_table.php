<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('name');
            $table->string('bop')->comment('Tempat Lahir');
            $table->date('bod')->comment('Tanggal Lahir');
            $table->enum('gender', ['LK','PR']);
            $table->string('village')->comment('Desa');
            $table->string('hamlet')->comment('Dusun');
            $table->string('religion')->comment('Agama');
            $table->string('kawin');
            $table->string('job')->comment('Pekerjaan');
            $table->enum('status',['Ada','Meninggal','Pindah'])->comment('Status Nyawa');
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
        Schema::dropIfExists('penduduks');
    }
}
