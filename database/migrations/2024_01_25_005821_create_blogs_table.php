<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('blogs', function (Blueprint $table) {
            $table->id();

            $table->integer('articleid')->nullable(); // chính của event
            $table->integer('isLike')->default(0)->comment("1 là event 0 là content");
            $table->integer('lookNum')->default(1);
            $table->integer('id_user_create')->default(0);
            $table->integer('likeNum')->default(1);

            $table->string('firstIncrease')->nullable();
            $table->string('firstName')->nullable();
            $table->string('headImg')->nullable();
            $table->string('img')->nullable();
            $table->string('nickname')->nullable();
            $table->string('secondIncrease')->nullable();
            $table->string('secondName')->nullable();
            $table->string('secondPrice')->nullable();
            $table->string('title')->nullable();
            $table->string('firstPrice')->nullable();

            $table->text('content')->nullable();
            $table->text('details')->nullable();
            $table->text('likeImgList')->nullable();
            $table->text('lookImgList')->nullable();

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
        Schema::dropIfExists('blogs');
    }
}
