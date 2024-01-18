<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class complaint extends Model
{
    use HasFactory;
    protected $table = 'complains';


    protected $fillable = [
        "complaintid",
        "complainttypeid",
        "lookNum",
        "status",
        "id_user_create",
        "id_user_update",
        "complaintName",
        "headImg",
        "mobile",
        "money",
        "nickname",
        "realname",
        "zalo",
        "content",
        "img",
        "replenishContent",
        "replenishImg",

    ];
}
