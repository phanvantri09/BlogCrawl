<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 2; $i++) {
            // DB::table('users')->insert([
            //     'type' => 111,
            //     'email' => Str::random(10) . '@gmail.com',
            //     'password' => Hash::make('12345678'),
            //     'status' => 1
            // ]);
            // $table->string('email')->unique()->nullable();
            // $table->string('name')->nullable();
            // $table->string('number_phone')->unique()->nullable();
            // $table->string('code')->unique()->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->integer('type')->default(111)->comment('dùng để phân biệt tài khoản: 111 là user, 222 là admin');
            // $table->integer('status')->default(1)->comment('dùng để xác định trạng thái tài khoản: 1 là được sử dụng, 2 là bị chặn ');
            // $table->string('social_id')->nullable()->comment('láy id của nền tảng đăng ký: mail, facebook');
            // $table->string('social_type')->nullable()->comment('2 loại là mail và facebook => chỉ cần lưu là google hoặc facebook');
            // $table->bigInteger('id_user_referral')->nullable();
            // $table->string('image');
            // $table->string('address');
            // $table->string('birthday');
            DB::table('users')->insert([
                'type' => 222,
                'email' => 'admin'.$i.'@gmail.com',
                'password' => Hash::make('12345678@'),
                'status' => 1
            ]);
            DB::table('users')->insert([
                'type' => 111,
                'email' => 'user'.$i.'@gmail.com',
                'password' => Hash::make('12345678@'),
                'status' => 1
            ]);
        }
    }
}
