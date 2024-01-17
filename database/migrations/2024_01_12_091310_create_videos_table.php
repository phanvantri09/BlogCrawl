<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->string('headImg')->nullable();
            $table->string('linkUrl')->nullable(); // như link cũ
            $table->string('videoName')->nullable();
            $table->integer('status')->default(1);
            //
            $table->string('videoid')->nullable();// id của bên crawl
            //
            $table->text('videoFileName')->nullable();
            $table->string('url')->nullable();
            $table->integer('id_user')->nullable();//id_user_create
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
        Schema::dropIfExists('videos');
    }
}
