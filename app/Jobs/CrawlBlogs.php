<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Blog;
use DB;
use Illuminate\Support\Facades\Http;

class CrawlBlogs implements ShouldQueue
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
        //

        $response = Http::get('https://vnwallstreet.top/api/inter/article/list?limit=20&start=0&uid=-1');
        if ($response->successful()) {
            $data = $response->json();
            if ($data['code'] == 200 ) {
                DB::beginTransaction();
                try {
                    foreach ($data['data'] as $item) {
                        $PostByMessageid = Blog::where("articleid", $item["articleid"])->first();
                        if (empty($PostByMessageid)){
                            if(Blog::create(
                                [

                                    'articleid' => $item["articleid"], // chính của event
                                    'isLike' => $item["isLike"],
                                    'lookNum' => $item["lookNum"],
                                    'id_user_create' => 0,
                                    'likeNum' => $item["likeNum"],

                                    'firstIncrease' => $item["firstIncrease"],
                                    'firstName' => $item["firstName"],
                                    'headImg' => $item["headImg"],
                                    'img' => $item["img"],
                                    'nickname' => $item["nickname"],
                                    'secondIncrease' => $item["secondIncrease"],
                                    'secondName' => $item["secondName"],
                                    'secondPrice' => $item["secondPrice"],
                                    'title' => $item["title"],
                                    'firstPrice' => $item["firstPrice"],

                                    'details' => $item["details"],
                                    'likeImgList' => !empty($item["likeImgList"]) ? implode(",", $item["likeImgList"]) : '',
                                    'lookImgList' => !empty($item["lookImgList"]) ? implode(",", $item["lookImgList"]) : '' ,
                                    'content' => $item["content"],
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
