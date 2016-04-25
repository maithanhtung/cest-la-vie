<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLophocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lophoc', function (Blueprint $table) {
            $table->increments('lop_id');
            $table->integer('mon_id');
            $table->integer('gv_id');
            $table->date('ngaybatdau');
            $table->date('ngaykethuc');
            $table->time('thoigianbatdau');
            $table->time('thoigianketthuc');
            $table->string('diadiemhoc');
            $table->timestamps();
            // $table->foreign('mon_id')
            // ->references('mon_id')->on('monhoc')
            // ->onDelete('cascade')
            // ->onUpdate('cascade');
            // $table->foreign('gv_id')
            // ->references('gv_id')->on('giaovien')
            // ->onDelete('cascade')
            // ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
   public function down()
    {
        Schema::drop('lophoc');
    }
}
