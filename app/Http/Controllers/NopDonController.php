<?php

namespace App\Http\Controllers;

use App\Models\DonUngTuyen;
use App\Models\TrangThai;
use Illuminate\Http\Request;

class NopDonController extends Controller
{
    public function list($id){
        $dons = DonUngTuyen::where('vitri_id', $id)->get();
        return view('admin.pages.donUngTuyen.list', compact('dons'));
    }
    public function edit($id){
        $don = DonUngTuyen::find($id);
        $trangThaiPhongVan = TrangThai::all();
        return view('admin.pages.donUngTuyen.form', compact('don', 'trangThaiPhongVan'));
    }
    public function update(Request $request ,$id){
        $don = DonUngTuyen::find($id);
        $don->trangthai_id= $request->trangThai;
        $don->save();
        return redirect()->back()->with('message', 'Đã cập nhật thành công');
    }
    public function delete($id){
        $don = DonUngTuyen::find($id);
        $don->delete();
        return redirect()->back()->with('message','Đã xóa thành công đơn');
    }
}