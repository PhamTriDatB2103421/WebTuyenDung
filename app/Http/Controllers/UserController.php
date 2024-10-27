<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login_a(){
        return view('user.login.login');
    }
    public function auth(Request $request){
        $email = $request->input('username');
        $password = Hash::make($request->input('password'));
        $user = User::where('email', $email)->first();
        if($user){
            if($user->password == $password){
                Auth::login($user);
                $request->session()->put('user', $user);
                if($user->roles == 1){
                    return view();
                }
                else return view('user.index');
            }
            else return redirect()->back()->with('error', 'Sai mật khẩu');
        }
        else return redirect()->back()->with('error', 'Tài khoản không tồn tại');
    }
    public function register(Request $request){
        $email = $request->input('username');
        $user = User::where('email', $email)->first();
        if(!$user){

        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->flush(); // Xóa tất cả session
        return redirect()->route('login');
    }
    public function edit($id){

    }
    public function store($id){

    }
    public function delete($id){

    }
}
