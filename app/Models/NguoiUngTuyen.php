<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NguoiUngTuyen extends Model
{
    protected $table = 'nguoi_ung_tuyen';

    protected $fillable = [
        'id',
        'hoten',
        'ngaysinh',
        'gioitinh',
        'diachi',
        'email',
        'sodienthoai',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function donUngTuyens()
    {
        return $this->hasMany(DonUngTuyen::class, 'nguoiUt_id', 'id');
    }
}
