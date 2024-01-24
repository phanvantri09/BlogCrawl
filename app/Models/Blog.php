<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = "blogs";
    protected $fillable  = [
            'articleid', // chính của event
            'isLike',
            'lookNum',
            'id_user_create',
            'likeNum',

            'firstIncrease',
            'firstName',
            'headImg',
            'img',
            'nickname',
            'secondIncrease',
            'secondName',
            'secondPrice',
            'title',
            'firstPrice',

            'content',
            'details',
            'likeImgList',
            'lookImgList',

        ];
}
