<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Post;
use DB;
use Illuminate\Support\Facades\Http;
class CrawlPost implements ShouldQueue
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
        $response = Http::get('https://vnwallstreet.top/api/inter/newsFlash/page?limit=12&start=0&uid=-1');
        if ($response->successful()) {
            $data = $response->json();
            if ($data['code'] == 200 ) {
                DB::beginTransaction();
                try {
                    foreach ($data['data'] as $item) {
                        $PostByMessageid = Post::where("messageid", $item["messageid"])->first();
                        if (empty($PostByMessageid)){
                            if(Post::create(
                                [
                                    "id_category" => 0,
                                    "content" => $item["content"],
                                    "createtime" => $item["createtime"],
                                    "facebookUrl" => $item["facebookUrl"],
                                    "headImg" => $item["headImg"],
                                    "important" => $item["important"],
                                    "influence" => $item["influence"],
                                    "linkUrl" => $item["linkUrl"],
                                    "lookNum" => $item["lookNum"],
                                    "messageid" => $item["messageid"],
                                    "otherId" => $item["otherId"],
                                    "status" => $item["status"],
                                    "title" => $item["title"],
                                    "type" => $item["type"],
                                    "youtubeUrl" => $item["youtubeUrl"],
                                    "id_user_create" => 0,
                                    "id_user_update" => 0,
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
