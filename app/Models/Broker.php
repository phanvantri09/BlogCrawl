<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Broker extends Model
{
    use HasFactory;
    protected $table = "brokers";
    protected $fillable  = [
        'pmid',
        'uid',
        'isHero',
        'leverMax',
        'likeNum',
        'lookNum',
        'resolutionRate',
        'resolveComplaintsNum',
        'serversNum',
        'status',
        'walletStatus',

        'facebookLink',
        'firstCountryLogo',
        'img',
        'licenseName',
        'logo',
        'nickname',
        'peoples',
        'skypeLink',
        'telegramLink',
        'twitterLink',
        'website',
        'youtubeLink',
        'zaloLink',
        
        'content',
        
        'platformLicenseList',
        'lookImgList',
        "id_user_create",
        "id_user_update",
    ];
}
