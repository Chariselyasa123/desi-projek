<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('faculty_id');

            $table->string('name', 50);
            $table->tinyInteger('semester');
            $table->string('tempat_lahir', 50);
            $table->date('birthday');
            $table->mediumText('address');
            $table->string('phone', 15);
            $table->string('email', 50);
            
            $table->timestamps();

            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('members');
    }
}
