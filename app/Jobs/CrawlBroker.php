<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Broker;
use App\Models\License;
use DB;
use Illuminate\Support\Facades\Http;
class CrawlBroker implements ShouldQueue
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
        $response = Http::get('https://vnwallstreet.top/api/inter/platformMerchants/listOrderByCreateTime?limit=20&start=0&uid=-1');
        if ($response->successful()) {
            $data = $response->json();
            if ($data['code'] == 200 ) {
                DB::beginTransaction();
                try {
                    foreach ($data['data'] as $item) {
                        $BrokerByMessageid = Broker::where("pmid", $item["pmid"])->first();
                        if (empty($BrokerByMessageid)){
                            if (!empty($item["platformLicenseList"])) {
                                foreach ($item["platformLicenseList"] as $platformLicenseList){
                                    License::create([
                                        "plid" =>  $platformLicenseList["plid"],
                                        "address" =>  $platformLicenseList["address"],
                                        "countryLogo" =>  $platformLicenseList["countryLogo"],
                                        "email" =>  $platformLicenseList["email"],
                                        "fax" =>  $platformLicenseList["fax"],
                                        "licenseLevel" =>  $platformLicenseList["licenseLevel"],
                                        "licenseLogo" =>  $platformLicenseList["licenseLogo"],
                                        "licenseName" =>  $platformLicenseList["licenseName"],
                                        "organizationName" =>  $platformLicenseList["organizationName"],
                                        "registrationCode" =>  $platformLicenseList["registrationCode"],
                                        "regulatoryEffectiveTime" => $platformLicenseList["regulatoryEffectiveTime"],
                                        "regulatoryLicense" =>  $platformLicenseList["regulatoryLicense"],
                                        "tel" =>  $platformLicenseList["tel"],
                                        "website" =>  $platformLicenseList["website"],
                                        "licenseScore" =>  $platformLicenseList["licenseScore"],
                                        "platformMerchantsId" =>  $platformLicenseList["platformMerchantsId"],
                                        "regulatoryNumber" =>  $platformLicenseList["regulatoryNumber"],
                                        "status" =>  $platformLicenseList["status"]
                                    ]);
                                }
                            }
                            if(Broker::create(
                                [
                                    "isHero" =>  $item["isHero"],
                                    "uid" =>  $item["uid"],
                                    "leverMax" =>  $item["leverMax"],
                                    "likeNum" =>  $item["likeNum"],
                                    "lookNum" =>  $item["lookNum"],
                                    "pmid" =>  $item["pmid"],
                                    "resolutionRate" =>  $item["resolutionRate"] ?? 0,
                                    "resolveComplaintsNum" =>  $item["resolveComplaintsNum"],
                                    "serversNum" =>  $item["serversNum"],
                                    "status" =>  $item["status"],
                                    "walletStatus" =>  $item["walletStatus"],
                                    "facebookLink" =>  $item["facebookLink"],
                                    "firstCountryLogo" =>  $item["firstCountryLogo"],
                                    "img" =>  $item["img"],
                                    "licenseName" =>  $item["licenseName"],
                                    "logo" =>  $item["logo"],
                                    "nickname" =>  $item["nickname"],
                                    "peoples" =>  $item["peoples"],
                                    "skypeLink" =>  $item["skypeLink"],
                                    "website" =>  $item["website"],
                                    "twitterLink" =>  $item["twitterLink"],
                                    "telegramLink" =>  $item["telegramLink"],
                                    "youtubeLink" =>  $item["youtubeLink"],
                                    "zaloLink" =>  $item["zaloLink"],
                                    "content" =>  $item["content"],

                                    "platformLicenseList" => '',
                                    "lookImgList" =>  !empty($item["lookImgList"]) ? implode(",", $item["lookImgList"]) : '',

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
