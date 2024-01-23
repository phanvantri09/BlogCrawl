<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EconomicCalendar extends Model
{
    use HasFactory;
    protected $table = "economic_calendars";
    protected $fillable  = [
        // is_event
        'events_id', // chính của event
        'is_event',
        'is_pub',
        'determine',

        'events_time',
        'country_translate',
        'region_translate',
        'events_translate',
        'events',
        'pub_time_tz_ori',
        'tz',

        // content
        'id_content', //  khóa chính  => id 
        'influence',

        'country_flag',
        'previous',
        'consensus',
        'actual',
        'revised',
        'translate',
        'economics_id', // khóa phụ => economics_id
        'pub_time_tzo',
        'origin_time',
        'tz_str',
        'country_flag',

        // dùng chung
        'star',
        'pub_time',
        'pub_time_tz',
    ];
}
