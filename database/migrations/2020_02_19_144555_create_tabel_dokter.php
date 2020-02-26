<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelDokter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_dokter', function (Blueprint $table) {
            $table->increments('idDokter');
            $table->string('nama', 255)->nullable();
            $table->string('foto', 255)->nullable();
            $table->string('str', 255)->nullable();
            $table->string('kualifikasi', 255)->nullable();
            $table->string('jenisKelamin', 255)->nullable();
            $table->string('tempatPraktek', 255)->nullable();
            $table->string('universitas', 255)->nullable();
            $table->string('kontak', 255)->nullable();
            $table->string('status', 255)->nullable()->default('tidak hadir');
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
        Schema::dropIfExists('tabel_dokter');
    }
}
