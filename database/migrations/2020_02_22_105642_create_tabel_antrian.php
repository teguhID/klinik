<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelAntrian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_antrian', function (Blueprint $table) {
            $table->bigIncrements('idAntrian');
            $table->string('idAnggota', 255)->nullable();
            $table->string('idDokter', 255)->nullable();
            $table->string('noAntrian', 255)->nullable();
            $table->longText('keluhan')->nullable();
            $table->string('penyakit', 255)->nullable();
            $table->longText('obat')->nullable();
            $table->string('status', 255)->nullable();
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
        Schema::dropIfExists('tabel_antrian');
    }
}
