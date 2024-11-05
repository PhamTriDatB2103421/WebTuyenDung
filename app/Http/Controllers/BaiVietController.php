<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BaiViet;
use Illuminate\Http\Request;
use App\Models\HinhAnhBaiViet;
use App\Models\ViTriTuyenDung;
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
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'tieu_de' => 'required|string|max:255',
            'noi_dung' => 'required|string',
            'vi_tri_tuyen_dung_id' => 'required|exists:vi_tri_tuyen_dung,id',
            'hinh_anh.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $baiviet = BaiViet::create([
            'tieu_de' => $request->tieu_de,
            'noi_dung' => $request->noi_dung,
            'ngay_dang' => now(),
            'nguoi_dung_id' => Auth::id(),
            'vi_tri_tuyen_dung_id' => $request->vi_tri_tuyen_dung_id,
        ]);
        if ($request->hasFile('hinh_anh')) {
            foreach ($request->file('hinh_anh') as $file) {
                $path = $file->store('uploads/hinh_anh', 'public');
                HinhAnhBaiViet::create([
                    'LinkAnh' => $path,
                    'BaiVietId' => $baiviet->id,
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
}
