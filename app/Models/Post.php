<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    protected $fillable = [
        'id_category',
        'id_user_create',
        'id_user_update',
        'status',
        'title',
        'des_preview',
        'description',
        'avt_image',
        // 'date_up_post',
        'video',
        'amount_read',
    ];
    // public function Post()
    // {
    //     return $this->belongsTo(Post::class, 'id_product', 'id');
    // }

}
