<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultiesTable extends Migration
{
    public function up()
    {
        Schema::create('faculties', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nama_fakultas', 100);
        });
    }

    public function down()
    {
        Schema::dropIfExists('faculties');
    }
}
