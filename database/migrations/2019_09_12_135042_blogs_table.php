<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Blogs
         * Thể loại tin tức
         */


        //Bài viết phần blogs
        Schema::create('blogs',function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('folder')->default('blogs');
            $table->string('image');
            $table->text('summary');
            $table->text('content');
            $table->bigInteger('view')->default(1);
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
