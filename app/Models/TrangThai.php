<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrangThai extends Model
{
    protected $table = 'trang_thai';

    protected $fillable = [
        'ma_tt',
        'ten_trangthai',
    ];

    public function donUngTuyens()
    {
        return $this->hasMany(DonUngTuyen::class, 'trangthai_id');
    }
}
