<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonUngTuyen extends Model
{
    protected $table = 'don_ung_tuyen';

    protected $fillable = [
        'vitri_id',
        'trangthai_id',
        'nguoiUt_id',
        'ngay_nop_don',
        'ngay_cap_nhat',
        'ghichu',
    ];

    public function nguoiUngTuyen()
    {
        return $this->belongsTo(NguoiUngTuyen::class, 'nguoiUt_id','id');
    }

    public function viTriTuyenDung()
    {
        return $this->belongsTo(ViTriTuyenDung::class, 'vitri_id', 'id');
    }

    public function trangThai()
    {
        return $this->belongsTo(TrangThai::class, 'trangthai_id', 'id');
    }
}
