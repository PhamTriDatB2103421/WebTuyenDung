<?php

namespace App\Http\Controllers;

use App\Models\DotUngTuyen;
use App\Models\ViTriTuyenDung;
use Illuminate\Http\Request;

class DotUngTuyenController extends Controller
{
    public function list()
    {
        $dotDungTuyens = DotUngTuyen::all();
        return view('admin.pages.dotungtuyen.list', [
            'dotUngTuyens' => $dotDungTuyens,
        ]);
    }
    public function add()
    {
        return view('admin.pages.dotungtuyen.form');
    }
    public function edit($id)
    {
        $dot = DotUngTuyen::find($id);
        return view('admin.pages.dotungtuyen.form', [
            'dotUngTuyen' => $dot,
        ]);
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'ten_dotungtuyen' => 'required|string|max:255|unique:dot_ung_tuyen,ten_dotungtuyen',
                'ngaybatdau' => 'required|date',
                'ngayketthuc' => 'required|date|after_or_equal:ngaybatdau',
                'mo_ta' => 'nullable|string',
            ]);

            DotUngTuyen::create([
                'ten_dotungtuyen' => $request->ten_dotungtuyen,
                'ngaybatdau' => $request->ngaybatdau,
                'ngayketthuc' => $request->ngayketthuc,
                'mo_ta' => $request->mo_ta,
            ]);

            return redirect()->back()->with('message', 'Thêm mới đợt ứng tuyển thành công!');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) {
                return redirect()->back()->withErrors(['ten_dotungtuyen' => 'Tên đợt ứng tuyển đã tồn tại!']);
            }
            return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra. Vui lòng thử lại!']);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $dotUngTuyen = DotUngTuyen::findOrFail($id);

            $request->validate([
                'ten_dotungtuyen' => 'required|string|max:255|unique:dot_ung_tuyen,ten_dotungtuyen,' . $dotUngTuyen->id,
                'ngaybatdau' => 'required|date',
                'ngayketthuc' => 'required|date|after_or_equal:ngaybatdau',
                'mo_ta' => 'nullable|string',
            ]);

            $dotUngTuyen->ten_dotungtuyen = $request->ten_dotungtuyen;
            $dotUngTuyen->ngaybatdau = $request->ngaybatdau;
            $dotUngTuyen->ngayketthuc = $request->ngayketthuc;
            $dotUngTuyen->mo_ta = $request->mo_ta;
            $dotUngTuyen->save();

            return redirect()->back()->with('message', 'Cập nhật đợt ứng tuyển thành công!');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) {
                return redirect()->back()->withErrors(['ten_dotungtuyen' => 'Tên đợt ứng tuyển đã tồn tại!']);
            }
            return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra. Vui lòng thử lại!']);
        }
    }
    public function delete($id){
        $temp  = DotUngTuyen::find($id);
        ViTriTuyenDung::where('dot_id', $id)->delete();
        $temp->delete();
        return redirect()->back()->with('message', 'Đã xóa thành công');
    }
}
