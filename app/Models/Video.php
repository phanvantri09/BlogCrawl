<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $table = 'videos';

    protected $fillable = [
        'title',
        'content',
        'headImg',
        'linkUrl',
        'videoName',
        'status',
        'videoid',
        'videoFileName',
        'url',
        'id_user'
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id', 'id_user');
    }
}
