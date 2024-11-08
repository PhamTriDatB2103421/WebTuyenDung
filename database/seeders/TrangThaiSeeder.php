<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TrangThaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trang_thai')->insert([
            [
                'ma_tt' => 1,
                'ten_trangthai' => 'Đang đợi xét duyệt',
            ],
            [
                'ma_tt' => 2,
                'ten_trangthai' => 'Đang chờ hẹn phỏng vấn',
            ],
            [
                'ma_tt' => 3,
                'ten_trangthai' => 'Đang chờ làm test',
            ],
            [
                'ma_tt' => 4,
                'ten_trangthai' => 'Đã nhận nhân viên',
            ],
            [
                'ma_tt' => -1,
                'ten_trangthai' => 'Không được xét duyệt',
            ],
            [
                'ma_tt' => -2,
                'ten_trangthai' => 'Phỏng vấn thất bại',
            ],
            [
                'ma_tt' => -3,
                'ten_trangthai' => 'Làm test thất bại',
            ],
            [
                'ma_tt' => -4,
                'ten_trangthai' => 'Không nhận nhân viên',
            ],
        ]);
    }
}
