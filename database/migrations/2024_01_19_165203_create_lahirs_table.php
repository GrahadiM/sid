<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLahirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lahirs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kk_id');
            $table->unsignedBigInteger('penduduk_id');
            $table->longText('desc')->comment('Cara Lahiran');
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
        Schema::dropIfExists('lahirs');
    }
}
