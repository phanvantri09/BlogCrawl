<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;
class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = [
        'title',
        'description',
        'type',
    ];
    public function blogs()
    {
        return $this->belongsTo(Blog::class, 'id_category', 'id');
    }
}
