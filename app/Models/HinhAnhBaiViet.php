<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class HinhAnhBaiViet extends Model
{
    use Notifiable;
    protected $fillable = [
        'id',
        'LinkAnh',
        'BaiVietId',
    ];
    protected $table = 'hinh_anh_bai_viet';
    public function baiViet()
    {
        return $this->hasOne(BaiViet::class, 'BaiVietId', 'id');
    }
}
