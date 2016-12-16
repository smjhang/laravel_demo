<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    // 定義狀態常數供程式比較
    const STATUS_ACTIVE = 'active';
    const STATUS_IDLE = 'idle';
    // 定義管理者角色供其他程式比對用
    const ADMIN_ROLE = 'admin';
    // 定義所有的身分設定值供程式判斷
    public static $ALL_ROLES = ['admin', 'user'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login_name', 'user_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
