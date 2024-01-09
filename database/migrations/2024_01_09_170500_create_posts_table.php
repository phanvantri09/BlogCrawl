<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('id_category')->nullable();
            $table->integer('id_user_create')->nullable();
            $table->integer('id_user_update')->nullable();
            $table->integer('status')->default(1);
            $table->string('title')->nullable();
            $table->text('des_preview')->nullable();
            $table->text('description')->nullable();
            $table->string('avt_image')->nullable();
            $table->text('video')->nullable();
            $table->integer('amount_read')->default(100);
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
        Schema::dropIfExists('posts');
    }
}
