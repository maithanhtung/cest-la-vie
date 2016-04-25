<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDangkyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dangky', function (Blueprint $table) {
            $table->increments('dk_id');
            $table->integer('lop_id');
            $table->integer('sv_id');
            $table->timestamps();
            // $table->foreign('lop_id')
            // ->references('lop_id')->on('lophoc')
            // ->onDelete('cascade')
            // ->onUpdate('cascade');
            // $table->foreign('sv_id')
            // ->references('sv_id')->on('sinhvien')
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
        Schema::drop('dangky');
    }
}
