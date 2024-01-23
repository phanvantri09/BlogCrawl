<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEconomicCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('economic_calendars', function (Blueprint $table) {
            $table->id();

            // is_event
            $table->integer('events_id')->nullable(); // chính của event
            $table->integer('is_event')->default(0)->comment("1 là event 0 là content");
            $table->integer('is_pub')->default(1);
            $table->integer('determine')->default(1);

            $table->string('events_time')->nullable();
            $table->string('country_translate')->nullable();
            $table->string('region_translate')->nullable();
            $table->string('events_translate')->nullable();
            $table->string('events')->nullable();
            $table->string('pub_time_tz_ori')->nullable();
            $table->string('tz')->nullable();

            // content
            $table->integer('id_content')->nullable(); //  khóa chính  => id 
            $table->integer('influence')->default(1);

            $table->string('country_flag')->nullable();
            $table->string('previous')->nullable();
            $table->string('consensus')->nullable();
            $table->string('actual')->nullable();
            $table->string('revised')->nullable();
            $table->string('translate')->nullable();
            $table->string('economics_id')->nullable(); // khóa phụ => economics_id
            $table->string('pub_time_tzo')->nullable();
            $table->string('origin_time')->nullable();
            $table->string('tz_str')->default("VIET-NAM");
            $table->string('country_flag')->nullable();

            // dùng chung
            $table->integer('star')->default(1);
            $table->string('pub_time')->nullable();
            $table->string('pub_time_tz')->nullable();

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
        Schema::dropIfExists('economic_calendars');
    }
}
