<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DotUngTuyen extends Model
{
    protected $table = 'dot_ung_tuyen';

    protected $fillable = [
        'ten_dotungtuyen',
        'ngaybatdau',
        'ngayketthuc',
        'mo_ta',
    ];
    public function viTri(){
        return $this->hasOne(ViTriTuyenDung::class, 'dot_id', 'id');
    }

}
