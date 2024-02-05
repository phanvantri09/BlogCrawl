<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gold extends Model
{
    use HasFactory;
    protected $table = "gold";

    protected $fillable  = [
            'goods_translate', 
            'date', // chính
            'total_stock',
            'inc_or_dec',
            'total_value',
        ];
}
