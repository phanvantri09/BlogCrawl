<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Gold;
use DB;
use Illuminate\Support\Facades\Http;

class CrawlGold implements ShouldQueue
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
        $response = Http::post('https://www.fxtin.com/page/finance/gold');
        // dd($response->json());
        if ($response->successful()) {
            $data = $response->json();
            if ($data['code'] == 200 ) {
                DB::beginTransaction();
                try {
                    foreach ($data['data'] as $item) {
                        $PostByMessageid = Gold::where("date", $item["date"])->first(); 
                        if (empty($PostByMessageid)){
                            if(Gold::create(
                                [
                                    "goods_translate" => $item["goods_translate"],
                                    "date" => $item["date"],
                                    "total_stock" => $item["total_stock"],
                                    "inc_or_dec" => $item["inc_or_dec"],
                                    "total_value" => $item["total_value"],
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
