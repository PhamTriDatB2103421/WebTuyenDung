<?php

namespace App\Http\Controllers;

use App\Models\DotUngTuyen;
use App\Models\ViTriTuyenDung;
use Illuminate\Http\Request;

class ViTriController extends Controller
{
    public function list(){
        return view('admin.pages.vitri.list', [
            'vitris' => ViTriTuyenDung::all(),
        ]);
    }
    public function add(){
        $dots = DotUngTuyen::all();
        return view('admin.pages.vitri.form',[
            'dots' => $dots,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'tenvitri' => 'required|string|max:255',
            'mota' => 'required|string',
            'yeucau' => 'required|string',
            'dot_id' => 'required|exists:dot_ung_tuyen,id', // Kiểm tra đợt tuyển dụng có tồn tại
        ]);

        ViTriTuyenDung::create($request->all());

        return redirect()->route('admin.vitri.list')->with('message', 'Thêm mới vị trí tuyển dụng thành công!');
    }
    public function edit($id)
    {
        $vitri = ViTriTuyenDung::findOrFail($id);
        $dots = DotUngTuyen::all(); // Lấy danh sách đợt tuyển dụng
        return view('admin.pages.vitri.form', compact('vitri', 'dots'));
    }

    // Cập nhật thông tin vị trí tuyển dụng
    public function update(Request $request, $id)
    {
        $request->validate([
            'tenvitri' => 'required|string|max:255',
            'mota' => 'required|string',
            'yeucau' => 'required|string',
            'dot_id' => 'required|exists:dot_ung_tuyen,id',
        ]);

        $vitri = ViTriTuyenDung::findOrFail($id);
        $vitri->update($request->all());

        return redirect()->route('admin.vitri.list')->with('message', 'Cập nhật vị trí tuyển dụng thành công!');
    }

    // Xóa vị trí tuyển dụng
    public function delete($id)
    {
        $vitri = ViTriTuyenDung::findOrFail($id);
        $vitri->delete();

        return redirect()->route('admin.vitri.list')->with('message', 'Xóa vị trí tuyển dụng thành công!');
    }
}
