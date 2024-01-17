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
            $table->text('content')->nullable();
            $table->string('createtime')->nullable(); // thừi gian này auto nên không cần tạo input đau
            $table->string('facebookUrl')->nullable(); // link thôi
            $table->integer('important')->default(0); // 0 là bình thường 1 là quan trọng màu đỏ
            $table->integer('influence')->default(2); // mức ảnh hưởng
            $table->string('linkUrl')->nullable();// link thôi
            $table->string('headImg')->nullable();
            $table->string('lookNum')->nullable(); //thay thế cho amount_read
            $table->string('messageid')->nullable(); // để phân biệt bài post khi cào về
            $table->string('otherId')->nullable(); // k biết tác dụng cứ để đây đã
            $table->integer('status')->default(1); // cho 1 là hiển thị, 0 là ẩn
            $table->string('title')->nullable(); // giống pre_des lúc trước
            $table->integer('type')->nullable(); // khi cập nhật cho id_category thì cho type == id_category lun
            $table->string('youtubeUrl')->nullable(); // thay vào chỗ trường video lúc trước
            $table->integer('id_user_create')->nullable(); // id người tạo
            $table->integer('id_user_update')->nullable(); // id người cập nhật
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
