<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Contracts\Routing\UrlGenerator;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\SendLinkMail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Box_item;
use App\Models\Transaction;
class ConstCommon {

    const ListTypeUser = ['user'=>111, 'admin'=>222];
    const TypeUser = 111;
    const TypeAdmin = 222;
    const ListStatusPost = [1=>"Hiện", 2=>"Ẩn"];
    const MailAdmin = [];

    const Domain = 'https://vnwallstreet.top';
    const ListAPI = 
        [
            'posts'=>'',
            'broders'=>'',
            'videos'=>'',
            'licenses'=>''
        ];

    public static function getAllCategory(){
        return Category::all();
    }
    public static function addImageToStorage($file, $name ){
          $file->storeAs('images', $name, 'public');
    }
    public static function getLinkImageToStorage($name){
        return url('storage/images/'.$name);
    }
    public static function delImageToStorage($name){
        return Storage::delete('images/'.$name);
    }
    public static function getCurrentTime(){
        $now = Carbon::now();
        $now->setTimezone('Asia/Ho_Chi_Minh');
        return $now->format('Y-m-d').'-'. $now->format('h-s-i');
    }
    public static function sendMail($email, $content){
        $mail = new SendMail($content);
        return Mail::to($email)->queue($mail);
    }
    public static function sendMailLinkPass($email, $content){
        $mail = new SendLinkMail($content);
        return Mail::to($email)->queue($mail);
    }
}
