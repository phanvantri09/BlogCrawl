<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // "complaintName": "Không thể kết nối TK",
    // "complaintid": 149,
    // "complainttypeid": 16,
    // "content": "ngày 5 tháng 7 năm 2022, từ khoảng lúc 21h45p tới khoảng 22h40p theo giờ Việt Nam, lúc đó thị trường đang biến động mạnh, tôi không tài nào đăng nhập tài khoản Exness được để nạp thêm tiền và cắt lỗ dẫn đến lệnh bị thanh lý, khoảng thời gian đó tôi nhận được thông báo của bên Exness là máy chủ đang bị gián đoạn. Nay tôi viết đơn này mong bên Exness có biện pháp xử lí thỏa đáng, cám ơn.\n\n( chenhhenhtac@gmail.com )",
    // "headImg": "http://img.xiaotuyun.vip/robotUpload/123.jpg",
    // "img": "https://img.wsbird.com/FhAxhI_Kab1Q79OpmWxEUl1kOZNt,https://img.wsbird.com/Fug3k7bajZLSZcc0LBPcTPF68FdH,https://img.wsbird.com/FiV7GDsq1bUz89jW3wHNnl9Zg0ab,https://img.wsbird.com/FhCQwMFKzA_8EDRbh6mq4mgVSJzp,https://img.wsbird.com/FqiA4Kt3FTrPk1VhCBHYIFWB4hBd,https://img.wsbird.com/Fv1KJiGb6MKPGRWhbbZ4ZLHiEWVq,https://img.wsbird.com/Fj66WSUpfBTJ5tAvlMy25sHgmTEq,https://img.wsbird.com/FhBqcs05JKet5fPTrAME73w2hkz4",
    // "lookNum": 9330206,
    // "mobile": "+84777449331",
    // "money": "1903.04",
    // "nickname": "Exness",
    // "realname": "chenh henh tac",
    // "replenishContent": "",
    // "replenishImg": "",
    // "status": 1,
    // "id_user_create": 13568,
    // "id_user_update": 13568,
    // "zalo": "Cht"

    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->integer("complaintid")->nullable();
            $table->integer("complainttypeid")->nullable();
            $table->integer("lookNum")->nullable();
            $table->integer("status")->nullable();
            $table->integer("id_user_create")->nullable();
            $table->integer("id_user_update")->nullable();

            $table->string("complaintName")->nullable();
            $table->string("headImg")->nullable();
            $table->string("mobile")->nullable();
            $table->string("money")->nullable();
            $table->string("nickname")->nullable(); //tên sàn bị phàn nàn
            $table->string("realname")->nullable(); // tên thật của sàn bị phàn nàn
            $table->string("zalo")->nullable();

            $table->text("content")->nullable();
            $table->text("img")->nullable();
            $table->text("replenishContent")->nullable();
            $table->text("replenishImg")->nullable();
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
        Schema::dropIfExists('complaints');
    }
}
