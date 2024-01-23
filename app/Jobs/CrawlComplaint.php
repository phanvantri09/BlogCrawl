<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\complaint;
use DB;
use Illuminate\Support\Facades\Http;
class CrawlComplaint implements ShouldQueue
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
        $response = Http::get('https://vnwallstreet.top/api/inter/complaint/list?limit=20&start=0&uid=-1');
        if ($response->successful()) {
            $data = $response->json();
            if ($data['code'] == 200 ) {
                DB::beginTransaction();
                try {
                    foreach ($data['data'] as $item) {
                        $complaintByMessageid = complaint::where("complaintid", $item["complaintid"])->first();
                        if (empty($complaintByMessageid)){
                            if(complaint::create(
                                [
                                    "complaintid" => $item["complaintid"],
                                    "complainttypeid" => $item["complainttypeid"],
                                    "lookNum" => $item["lookNum"],
                                    "status" => $item["status"],
                                    "id_user_create" => 0,
                                    "id_user_update" => 0,
                                    "complaintName" => $item["complaintName"],
                                    "headImg" => $item["headImg"],
                                    "mobile" => $item["mobile"],
                                    "money" => $item["money"],
                                    "nickname" => $item["nickname"],
                                    "realname" => $item["realname"],
                                    "zalo" => $item["zalo"],
                                    "content" => $item["content"],
                                    "img" => $item["img"],
                                    "replenishContent" => $item["replenishContent"],
                                    "replenishImg" => $item["replenishImg"],
                                ]
                            )){
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
