<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJenjangToProgramTable extends Migration
{
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->string('jenjang');
        });
    }

    public function down()
    {
        Schema::table('program', function (Blueprint $table) {
            $table->dropColumn('jenjang');
        });
    }
}
