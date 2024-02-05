<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Video;
use DB;
use Illuminate\Support\Facades\Http;
class CrawlVideo implements ShouldQueue
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

        $response = Http::get('https://vnwallstreet.top/api/inter/video/list?uid=-1');
        if ($response->successful()) {
            $data = $response->json();
            if ($data['code'] == 200 ) {
                DB::beginTransaction();
                try {
                    foreach ($data['data'] as $item) {
                        $VideoByMessageid = Video::where("videoid", $item["videoid"])->first();
                        if (empty($VideoByMessageid)){
                            if(Video::create(
                                [
                                    "title" => $item["title"],
                                    "content" => $item["content"],
                                    "headImg" => $item["headImg"],
                                    "linkUrl" => $item["linkUrl"],
                                    "videoName" => $item["videoName"],
                                    "status" => $item["status"],
                                    "videoid" => $item["videoid"],
                                    "videoFileName" => $item["videoFileName"],
                                    "url" => $item["url"],
                                    "id_user" => 0,
                                ]
                            )){
                                // dd($item);
                                \Log::error(1);
                            } else {
                                \Log::error(2);
                            }
                        }

                    }
                    DB::commit();
                } catch (\Throwable $th) {
                    DB::rollBack();
                    //throw $th;
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
