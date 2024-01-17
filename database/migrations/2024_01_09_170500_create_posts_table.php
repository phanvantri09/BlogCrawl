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

    //  "actual": "",
    //  "articleid": -1,
    //  "commentNum": 0,
    //  "consensus": "",
    //  "content": "USD/JPY đã tăng 1,00% trong ngày và hiện ở mức 147,22.",
    //  "createtime": 1705425217468,
    //  "facebookUrl": "",
    //  "firstIncrease": "",
    //  "firstName": "WTI",
    //  "firstPrice": "",
    //  "headImg": "",
    //  "img": "",
    //  "important": "0",
    //  "influence": 2,
    //  "isLike": 2,
    //  "labelIds": "",
    //  "labelList": [],
    //  "likeNum": 0,
    //  "linkUrl": "",
    //  "lookNum": 339,
    //  "messageid": 174818,
    //  "nickname": "",
    //  "otherId": "202401170113371050",
    //  "previous": "",
    //  "quotation": -1,
    //  "secondIncrease": "",
    //  "secondName": "",
    //  "secondPrice": "",
    //  "star": "",
    //  "status": 1,
    //  "tiktokUrl": "",
    //  "title": "",
    //  "type": 2,
    //  "updatetime": -1,
    //  "youtubeUrl": ""

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
