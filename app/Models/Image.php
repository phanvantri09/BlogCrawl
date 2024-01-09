<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
class Image extends Model
{
    use HasFactory;
    protected $table = 'images';

    protected $fillable = [
        'id_post',
        'name',
        'link',
        'type',
        'is_slide',
    ];
    public function Post()
    {
        return $this->belongsTo(Post::class, 'id_product', 'id');
    }
}
