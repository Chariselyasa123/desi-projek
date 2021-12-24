<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('faculty_id');

            $table->string('nama_prodi');

            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
