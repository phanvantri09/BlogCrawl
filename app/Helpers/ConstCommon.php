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
            'posts'=>'https://vnwallstreet.top/api/inter/newsFlash/page?limit=10&start=0&uid=-1',
            'broders'=>'https://vnwallstreet.top/api/inter/platformMerchants/listOrderByCreateTime?limit=20&start=0&uid=-1',
            'videos'=>'https://vnwallstreet.top/api/inter/video/list?uid=-1',
            'licenses'=>'',
            'complaint'=>'https://vnwallstreet.top/api/inter/complaint/list?limit=20&start=0&uid=-1',
            'economic_calendar' => 'https://www.fxtin.com/page/finance/calendarEvents?important=0&date=',
            'blogs'=>'https://vnwallstreet.top/api/inter/article/list?limit=20&start=0&uid=-1'
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

    public static function getSevenDayEconomiCalender(){
        // Lấy ngày hiện tại
        $currentDate = Carbon::now();
        $currentDate->setTimezone('Asia/Ho_Chi_Minh');
        // Trừ 2 ngày từ ngày hiện tại
        $startDate = $currentDate->subDays(2);

        // Tạo mảng chứa 7 ngày
        $dates = [];

        // Loop để thêm 7 ngày vào mảng
        for ($i = 0; $i < 7; $i++) {
            $dates[$i] = urlencode($startDate->format('Y/m/d'));
            $startDate->addDay();
        }
        return $dates;
    }
    public static function getLinkIMG($data){
        $needle = 'http';
        $check = 1;

        if(!empty($data)){
            if (strpos($data, $needle) !== false) {
                $check = 1;
            } else {
                $check = 0;
            }
            if($check == 0){
                return self::getLinkImageToStorage($data);
            }
        }
        return $data;
    }

    public static function formatTimeCmt($value){
        $dateTime = Carbon::parse($value);
        $formattedDateTime = $dateTime->format('H:i:s d/m/Y');
        return $formattedDateTime;
    }

    public static function formatTimeblogSeconMinusHour($value){
        $dateTime = Carbon::parse($value);
        $formattedDateTime = $dateTime->format('H:i:s');
        return $formattedDateTime;
    }
    public static function formatTimeblogDateMonth($value){
        $dateTime = Carbon::parse($value);
        $formattedDateTime = $dateTime->format('d/m');
        return $formattedDateTime;
    }

    public static function limitString($string, $limit) {
        if (strlen($string) > $limit) {
            $string = substr(strip_tags($string), 0, $limit) . '...';
        }
        return $string;
    }
}
