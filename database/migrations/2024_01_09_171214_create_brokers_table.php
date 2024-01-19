<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrokersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brokers', function (Blueprint $table) {
            $table->id();
            $table->integer("uid")->default(0); // khóa chính của cái này
            $table->integer("isHero")->default(1); // 1 là có nhãn hero 2 là không có
            $table->integer("leverMax")->default(1);
            $table->integer("likeNum")->default(100);
            $table->integer("lookNum")->default(100);
            $table->integer("pmid")->default(0);
            $table->integer("resolutionRate")->default(0);
            $table->integer("resolveComplaintsNum")->default(0);
            $table->integer("serversNum")->default(0);
            $table->integer("status")->default(1);
            $table->integer("walletStatus")->default(1); // 1 là mở, 2 là đóng

            $table->string("facebookLink")->nullable();
            $table->string("firstCountryLogo")->nullable();
            $table->string("img")->nullable();
            $table->string("licenseName")->nullable();
            $table->string("logo")->nullable();
            $table->string("nickname")->nullable();
            $table->string("peoples")->nullable();
            $table->string("skypeLink")->nullable();
            $table->string("telegramLink")->nullable();
            $table->string("twitterLink")->nullable();
            $table->string("website")->nullable();
            $table->string("youtubeLink")->nullable();
            $table->string("zaloLink")->nullable();

            $table->text("content")->nullable();

            $table->longtext('platformLicenseList')->nullable();
            $table->longtext('lookImgList')->nullable();
            $table->integer("id_user_create")->default(0);
            $table->integer("id_user_update")->default(0);
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
        Schema::dropIfExists('brokers');
    }
}
