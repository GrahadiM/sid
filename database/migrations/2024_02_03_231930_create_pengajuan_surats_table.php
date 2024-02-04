<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_surats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            // Biodata
            $table->string('category')->comment('Su-Ket Domisili, Kelahiran, Kematian, Pendatang, Pindahan');
            $table->string('name');
            $table->string('nik');
            $table->string('bop')->comment('Tempat Lahir');
            $table->date('bod')->comment('Tanggal Lahir');
            $table->enum('gender', ['LK','PR']);

            // Data file
            $table->string('ktp')->nullable();
            $table->string('kk')->nullable();

            // Data Tambahan
            $table->enum('status', ['proses','diterima','ditolak'])->comment('Status Pengajuan');
            $table->string('date')->comment('Tanggal Datang/Pindahan/Meninggal');
            $table->longText('reason')->comment('Sebab');

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
        Schema::dropIfExists('pengajuan_surats');
    }
}
