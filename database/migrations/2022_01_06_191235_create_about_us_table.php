<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('ketua_umum');
            $table->string('gambar_ketua_umum');
            $table->string('sekertaris');
            $table->string('gambar_sekertaris');
            $table->string('bendahara');
            $table->string('gambar_bendahara');
            $table->string('kepala_bidang_1');
            $table->string('gambar_kepala_bidang_1');
            $table->string('kepala_bidang_2');
            $table->string('gambar_kepala_bidang_2');
            $table->string('kepala_bidang_3');
            $table->string('gambar_kepala_bidang_3');
            $table->string('kepala_bidang_4');
            $table->string('gambar_kepala_bidang_4');
            $table->string('kepala_bidang_5');
            $table->string('gambar_kepala_bidang_5');
            $table->string('kepala_divisi_1');
            $table->string('gambar_kepala_divisi_1');
            $table->string('kepala_divisi_2');
            $table->string('gambar_kepala_divisi_2');
            $table->string('periode_menjabat');

            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('about_us');
    }
}
