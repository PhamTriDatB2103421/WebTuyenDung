<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\BaiViet;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $baiViets = BaiViet::where('updated_at', '>=', Carbon::now()->subDays(30))
        ->orderBy('updated_at', 'desc')
        ->with('hinhAnhBaiViets')->get();
        return view('user.index',compact('baiViets'));
    }
}
