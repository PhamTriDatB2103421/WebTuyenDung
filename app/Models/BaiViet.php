<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    protected $table = 'bai_viet';

    protected $fillable = [
        'tieu_de',
        'noi_dung',
        'ngay_dang',
        'nguoi_dung_id',
        'vi_tri_tuyen_dung_id',
    ];

    public function hinhAnhBaiViets()
    {
        return $this->hasMany(HinhAnhBaiViet::class, 'BaiVietId', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'nguoi_dung_id');
    }

    public function viTriTuyenDung()
    {
        return $this->belongsTo(ViTriTuyenDung::class, 'vi_tri_tuyen_dung_id', 'id');
    }

    public function dotUngTuyen()
    {
        return $this->viTriTuyenDung->dotTuyenDung;
    }
}
