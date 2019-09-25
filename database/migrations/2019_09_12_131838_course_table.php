<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //Khoá học offline
        Schema::create('course_offlines',function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->text('content');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
        //Khóa học đang tuyển
        Schema::create('course_enrolling',function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('name');

            $table->string('image');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });



        //Khóa học online
        Schema::create('course_onlines',function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('link')  ;
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
