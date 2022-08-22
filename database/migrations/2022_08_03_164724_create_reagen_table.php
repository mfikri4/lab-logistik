<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReagenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reagen', function (Blueprint $table) {
            $table->bigIncrements('id_reagen');
            $table->string('metode_analisis');
            $table->string('nama_reagen');
            $table->string('brand');
            $table->string('no_catalog');
            $table->string('tanggal_ed');
            $table->string('tempat_penyimpanan');
            $table->string('keterangan');
            $table->string('volume_stok');
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
        Schema::dropIfExists('reagen');
    }
}
