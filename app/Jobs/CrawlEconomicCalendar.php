<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\EconomicCalendar;
use DB;
use Illuminate\Support\Facades\Http;
use App\Helpers\ConstCommon;

class CrawlEconomicCalendar implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $API = "https://www.fxtin.com/page/finance/calendarEvents?important=0&date=";

        foreach (ConstCommon::getSevenDayEconomiCalender() as $key => $date) {
            # code...
            $API_curent = $API.$date;
            $response = Http::get($API_curent);
            if ($response->successful()) {
                $data = $response->json();
                if ($data['code'] == 200 ) {
                    DB::beginTransaction();
                    try {
                        foreach ($data['data']['list'] as $item) {
                            if ( isset($item['content']) ) {
                                foreach ($item['content'] as $keyContent => $itemContent) {
                                    $EconomicCalendar = EconomicCalendar::where("id_content", $itemContent["id"])->where('pub_time', $itemContent["pub_time"])->first();
                                    if (empty($EconomicCalendar)){
                                        if(EconomicCalendar::create([
                                            'is_event'=> 0,
                                            // 'events_id'=> $itemContent["events_id"], // chính của event
                                            // 'is_pub'=> $itemContent["is_pub"],
                                            // 'determine'=> $itemContent["determine"],

                                            // 'events_time'=> $itemContent["events_time"],
                                            // 'country_translate'=> $itemContent["country_translate"],
                                            // 'region_translate'=> $itemContent["region_translate"],
                                            // 'events_translate'=> $itemContent["events_translate"],
                                            // 'events'=> $itemContent["events"],
                                            // 'pub_time_tz_ori'=> $itemContent["pub_time_tz_ori"],
                                            // 'tz'=> $itemContent["tz"],

                                            // content
                                            'id_content'=> $itemContent["id"], //  khóa chính  => id
                                            'influence'=> $itemContent["influence"],


                                            'previous'=> $itemContent["previous"],
                                            'consensus'=> $itemContent["consensus"],
                                            'actual'=> $itemContent["actual"],
                                            'revised'=> $itemContent["revised"],
                                            'translate'=> $itemContent["translate"],
                                            'economics_id'=> $itemContent["economics_id"], // khóa phụ => economics_id
                                            'pub_time_tzo'=> $itemContent["pub_time_tzo"],
                                            'origin_time'=> $itemContent["origin_time"],
                                            'tz_str'=> $itemContent["tz_str"],
                                            'country_flag'=> $itemContent["country_flag"],

                                            // dùng chung
                                            'star'=> $itemContent["star"],
                                            'pub_time'=> $itemContent["pub_time"],
                                            'pub_time_tz'=> $itemContent["pub_time_tz"]
                                        ])){
                                            \Log::error("Thành công");
                                        } else {
                                            \Log::error("Không Thành công");
                                        }
                                    }
                                }
                            } else {
                                $EconomicCalendar = EconomicCalendar::where("events_id", $item["events_id"])->where('pub_time', $item["pub_time"])->first();
                                if (empty($EconomicCalendar)){
                                    if(EconomicCalendar::create([
                                        'is_event'=> 1,
                                        'events_id'=> $item["events_id"], // chính của event
                                        'is_pub'=> $item["is_pub"],
                                        'determine'=> $item["determine"],

                                        'events_time'=> $item["events_time"],
                                        'country_translate'=> $item["country_translate"],
                                        'region_translate'=> $item["region_translate"],
                                        'events_translate'=> $item["events_translate"],
                                        'events'=> $item["events"],
                                        'pub_time_tz_ori'=> $item["pub_time_tz_ori"],
                                        'tz'=> $item["tz"],

                                        // // content
                                        // 'id_content'=> $item["id_content"], //  khóa chính  => id
                                        // 'influence'=> $item["influence"],


                                        // 'previous'=> $item["previous"],
                                        // 'consensus'=> $item["consensus"],
                                        // 'actual'=> $item["actual"],
                                        // 'revised'=> $item["revised"],
                                        // 'translate'=> $item["translate"],
                                        // 'economics_id'=> $item["economics_id"], // khóa phụ => economics_id
                                        // 'pub_time_tzo'=> $item["pub_time_tzo"],
                                        // 'origin_time'=> $item["origin_time"],
                                        // 'tz_str'=> $item["tz_str"],
                                        // 'country_flag'=> $item["country_flag"],

                                        // dùng chung
                                        'star'=> $item["star"],
                                        'pub_time'=> $item["pub_time"],
                                        'pub_time_tz'=> $item["pub_time_tz"]
                                    ])){
                                        \Log::error("Thành công");
                                    } else {
                                        \Log::error("không Thành công");
                                    }
                                }
                            }
                        }
                        DB::commit();
                    } catch (\Throwable $th) {
                        DB::rollBack();
                        // dd($th);
                        dd($th);
                    }

                }
                // dd($newArray);
                // return response()->json($data); // Trả về dữ liệu dạng JSON
            } else {
                abort($response->status());
            }
        }
    }
}
