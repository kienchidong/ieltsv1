<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntroduceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('introduce', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('logo');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('facebook');
            $table->string('title');
            $table->text('content');
            $table->timestamps();
        });

        /*
         * Thông tin người đăng ký
         * */
        Schema::create('informations', function (Blueprint $table){
           $table->bigIncrements('id');
           $table->string('name')->nullable();
           $table->string('email')->nullable();
           $table->string('phone')->nullable();
           $table->string('message')->nullable();
           $table->tinyInteger('status')->default(0);
           $table->timestamps();
        });

        /*
         * thời gian
         * */
        Schema::create('time', function (Blueprint $table){
           $table->bigIncrements('id');
           $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
