<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tym extends Model
{
    use HasFactory;
    protected $table = 'tyms';

    protected $fillable = [
        'id_broker',
        'id_post',
        'id_user',
    ];
}
