<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixSinhvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('sinhvien', function ($table) {
    $table->dropColumn('sv_id');
    });
         Schema::table('sinhvien', function ($table) {
      $table->increments('id');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('sinhvien');
    }
}
