<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'status',
        'id_user_referral',
        'social_id', //không cần
        'social_type', //không cần
        'id_user_referral',// dùng id của admin thêm user này
        'number_phone',
        'code', //chưa cần thêm
        'image',
        'address',
        'birthday',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $cascadeDeletes = true;

    public function post(){
        return $this->hasMany(Post::class,'id_user','id');
    }
    public function referredUser()
    {
        return $this->belongsTo(User::class, 'id_user_referral', 'id');
    }
    public function referredUserGT($id_user_referral)
    {
        return DB::table('users')->where('id','=', $id_user_referral)->first();
    }
    public function getAllReferringUsers()
    {
        $referringUsers = [];

        $currentUser = $this;
        while ($currentUser->referredUser) {
            $referringUsers[] = $currentUser->referredUser;
            $currentUser = $currentUser->referredUser;
        }

        return $referringUsers;
    }
    public function getAllReferringUsersGT()
    {
        $referringUsers = [];
        $i = 1;
        $currentUser = $this;
        $referringUsers[0] = $this;
        while ($currentUser->id_user_referral) {
            if (!empty($currentUser->id_user_referral)) {
                $currentUser = self::referredUserGT($currentUser->id_user_referral);
                $referringUsers[$i] = $currentUser;
                $i++;
            }

        }

        return $referringUsers;
    }

}
