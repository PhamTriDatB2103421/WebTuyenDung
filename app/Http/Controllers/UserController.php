<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function login_a()
    {
        return view('user.login.login');
    }
    public function auth(Request $request)
    {
        $email = $request->input('username');
        $password = $request->input('password'); // Không băm ở đây
        $user = User::where('email', $email)->first();

        if ($user) {
            // Sử dụng Hash::check để kiểm tra mật khẩu
            if (Hash::check($password, $user->password)) {
                Auth::login($user);
                $request->session()->put('user', $user);

                if ($user->roles != 1) {
                    return redirect()->route('admin.index'); // Chuyển tới trang admin
                } else {
                    return redirect()->route('index'); // Chuyển tới trang user
                }
            } else {
                return redirect()->back()->with('error', 'Sai mật khẩu');
            }
        } else {
            return redirect()->back()->with('error', 'Tài khoản không tồn tại');
        }
    }

    public function register_user(Request $request)
    {
        // Lấy email từ request
        $email = $request->input('email');

        // Kiểm tra xem email đã tồn tại chưa
        $user = User::where('email', $email)->first();

        if ($user == null) {
            // Tạo mới người dùng
            User::create([
                'username' => $request->input('email'),
                'email' => $email,
                'password' => Hash::make($request->input('password')),
                'hoten' => $request->input('name'),
                'sodienthoai' => $request->input('phone'),
                'roles' => 1,
            ]);

            // Trả về thông báo thành công
            return redirect()->back()->with('error', 'Đã tạo tài khoản thành công');
        } else {
            // Trả về thông báo lỗi
            return redirect()->back()->with('error', 'Tài khoản đã tồn tại');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush(); // Xóa tất cả session
        return redirect()->route('login');
    }
    public function edit($id) {}
    public function store($id) {}
    public function delete($id) {}
}
