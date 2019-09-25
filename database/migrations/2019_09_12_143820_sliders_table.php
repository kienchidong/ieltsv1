<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Sliders
         * Phần ảnh chạy trên trang chủ
         */
         Schema::create('images',function (Blueprint $table)
         {
             $table->bigIncrements('id');
             $table->string('image');
             $table->string('title')->nullable();
             $table->tinyInteger('location');
             $table->tinyInteger('status')->default(1);
             $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
