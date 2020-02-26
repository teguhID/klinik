<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelAnggota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_anggota', function (Blueprint $table) {
            $table->bigIncrements('idAnggota');
            $table->string('namaAnggota', 255)->nullable();
            $table->string('ktp', 255)->nullable();
            $table->string('usia', 255)->nullable();
            $table->longText('alamat')->nullable();
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
        Schema::dropIfExists('tabel_anggota');
    }
}
