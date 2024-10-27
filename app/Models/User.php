<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username',
        'password',
        'email',
        'hoten',
        'sodienthoai',
        'roles',
    ];

    public function nguoiUngTuyen()
    {
        return $this->hasOne(NguoiUngTuyen::class, 'user_id', 'id');
    }
}


