<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViTriTuyenDung extends Model
{
    protected $table = 'vi_tri_tuyen_dung';

    protected $fillable = [
        'tenvitri',
        'mota',
        'yeucau',
        'dot_id',
    ];

    public function baiViets()
    {
        return $this->hasMany(BaiViet::class, 'vi_tri_tuyen_dung_id','id');
    }
    public function dotTuyenDung(){
        return $this->belongsTo(DotUngTuyen::class, 'dot_id', 'id');
    }
}
