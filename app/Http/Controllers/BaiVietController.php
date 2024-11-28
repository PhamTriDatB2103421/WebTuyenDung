<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;
use App\Models\DonUngTuyen;
use App\Models\HinhAnhBaiViet;
use App\Models\NguoiUngTuyen;
use App\Models\ViTriTuyenDung;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BaiVietController extends Controller
{
    public function list()
    {
        $baiviets = BaiViet::with('user', 'hinhAnhBaiViets')->get();

        return view('admin.pages.baiviet.list', compact('baiviets'));
    }

    public function add()
    {
        $viTriTuyenDungs = ViTriTuyenDung::all();

        return view('admin.pages.baiviet.create', [
            'viTriTuyenDungs' => $viTriTuyenDungs,
        ]);
    }

    public function store(Request $request)
    {
        $baiviet = BaiViet::create([
            'tieu_de' => $request->tieu_de,
            'noi_dung' => $request->noi_dung,
            'ngay_dang' => now(),
            'nguoi_dung_id' => Auth::id(),
            'vi_tri_tuyen_dung_id' => $request->vi_tri_tuyen_dung_id,
        ]);
        if ($request->hasFile('hinh_anh')) {
            foreach ($request->file('hinh_anh') as $image) {
                $path = $image->store('uploads/hinh_anh', 'public');
                $baiviet->hinhAnhBaiViets()->create([
                    'LinkAnh' => basename($path),
                ]);
            }
        }

        return redirect()->route('admin.baiviet.list')->with('message', 'Thêm bài viết thành công!');
    }

    public function edit($id)
    {
        $baiviet = BaiViet::with('hinhAnhBaiViets')->findOrFail($id);

        $viTriTuyenDungs = ViTriTuyenDung::all();

        return view('admin.pages.baiviet.edit', compact('baiviet', 'viTriTuyenDungs'));
    }

    public function update(Request $request, $id)
    {
        $baiviet = BaiViet::findOrFail($id);
        $baiviet->tieu_de = $request->tieu_de;
        $baiviet->noi_dung = $request->noi_dung;
        $baiviet->vi_tri_tuyen_dung_id = $request->vi_tri_tuyen_dung_id;

        if ($request->hasFile('hinh_anh')) {
            foreach ($request->file('hinh_anh') as $image) {
                $path = $image->store('uploads/hinh_anh', 'public');
                $baiviet->hinhAnhBaiViets()->create([
                    'LinkAnh' => basename($path),
                ]);
            }
        }

        if ($request->has('delete_images')) {
            foreach ($request->delete_images as $imageId) {
                $image = HinhAnhBaiViet::findOrFail($imageId);
                Storage::delete('public/uploads/hinh_anh/' . $image->LinkAnh);
                $image->delete();
            }
        }

        $baiviet->save();

        return redirect()->route('admin.baiviet.list', $id)->with('message', 'Cập nhật bài viết thành công!');
    }

    public function delete($id)
    {
        $baiviet = BaiViet::findOrFail($id);
        $baiviet->delete();

        return redirect()->route('admin.baiviet.list')->with('message', 'Bài viết đã được xóa thành công.');
    }

    public function baiViet($id)
    {
        $baiviet = BaiViet::with('hinhAnhBaiViets')->find($id);

        return view('user.pages.baiviet.baiviet', [
            'baiViet' => $baiviet,
        ]);
    }

    public function nop($idu, $idbv)
    {
        $nguoiUngTuyen = NguoiUngTuyen::where('user_id', $idu)->get();
        if (! $nguoiUngTuyen) {
            return redirect()->route('loivcl')->with('error', 'Hồ sơ cá nhân chưa có không tồn tại.');
        }
        // Kiểm tra xem vị trí tuyển dụng (bài viết) có tồn tại không
        $baiViet = BaiViet::find($idbv);
        if (! $baiViet) {
            return redirect()->back()->with('error', 'Vị trí tuyển dụng không tồn tại.');
        }
        $vitriTuyenDung = $baiViet->viTriTuyenDung->tenvitri;
        $mota = $baiViet->viTriTuyenDung->mota;
        $yeucau = $baiViet->viTriTuyenDung->yeucau;

        // Tạo đơn ứng tuyển mới
        $donUngTuyen = DonUngTuyen::create([
            'vitri_id' => $baiViet->viTriTuyenDung->id,
            'trangthai_id' => 3,
            'nguoiUt_id' => $nguoiUngTuyen->id,
            'ngay_nop_don' => Carbon::now(),
            'ngay_cap_nhat' => Carbon::now(),
            'ghichu' => 'Ứng tuyển cho vị trí: ' . $vitriTuyenDung . '. Mô tả: ' . $mota . '. Yêu cầu: ' . $yeucau,
        ]);
        if ($donUngTuyen) {
            return redirect()->back()
                ->with('success', 'Đơn ứng tuyển của bạn đã được gửi thành công!');
        } else {
            return redirect()->back()->with('error', 'Có lỗi khi gửi đơn ứng tuyển. Vui lòng thử lại!');
        }
    }

    public function user_list()
    {
        $baiViets = BaiViet::with('hinhAnhBaiViets')->get();

        return view('user.pages.baiviet.list', compact('baiViets'));
    }
}
