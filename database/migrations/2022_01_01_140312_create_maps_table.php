<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapsTable extends Migration
{
    public function up()
    {
        Schema::create('maps', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nama_gunung');
            $table->string('tinggi');
            $table->string('luas');
            $table->string('jenis_gunung');
            $table->string('status_gunung');
            $table->string('status_pendakian');
            $table->string('cuaca');
            $table->string('kuota_pendakian_hari_ini');
            $table->string('jalur_pendakian');
            $table->mediumText('persyaratan_pendakian');
            $table->mediumText('peraturan_wilayah_gunung');
            $table->string('biaya_simaksi');
            $table->mediumText('data_kecelakaan_gunung');
            $table->string('contact_us');
            $table->decimal('long', 10, 7);
            $table->decimal('lat', 10, 7);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('maps');
    }
}
