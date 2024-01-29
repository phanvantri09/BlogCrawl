<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'id_broker',
        'id_coment',
        'id_post',
        'content',
        'id_user',
        'id_blog'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'id_post');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'id_coment');
    }
}
