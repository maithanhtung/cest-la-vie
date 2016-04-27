<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixGiaovienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('giaovien', function ($table) {
    $table->dropColumn('gv_id');
    });
         Schema::table('giaovien', function ($table) {
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
         Schema::drop('giaovien');
    }
}
