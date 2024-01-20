<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;
    protected $table = 'licenses';

    protected $fillable = [
        'plid', // khóa chính
        'address',
        'countryLogo',
        'email',
        'fax',
        'licenseLevel',
        'licenseLogo',
        'licenseName',
        'organizationName',
        'registrationCode',
        'regulatoryEffectiveTime',
        'regulatoryLicense',
        'tel',
        'website',
        'licenseScore',
        'platformMerchantsId', // khóa ngoại
        'regulatoryNumber',
        'status',
    ];
}
