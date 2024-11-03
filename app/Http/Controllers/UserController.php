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
    public function login_b()
    {
        return view('user.login.register');
    }
    public function list()
    {
        $users = User::all();
        return view(
            'admin.users.list',
            [
                'all_users' => $users,
            ]
        );
    }
    public function auth(Request $request)
    {
        $email = $request->input('username');
        $password = $request->input('password');
        $user = User::where('email', $email)->first();

        if ($user) {
            if (Hash::check($password, $user->password)) {
                Auth::login($user);
                $request->session()->put('user', $user);

                if ($user->roles != 1) {
                    return redirect()->route('admin.pages.index');
                } else {
                    return redirect()->route('index');
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
        $request->session()->flush();
        return redirect()->route('login');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.pages.users.form', [
            'user' => $user,
        ]);
    }
    public function add()
    {
        return view('admin.pages.users.form');
    }
    public function store(Request $request)
    {
        try {
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'hoten' => $request->fullname,
                'sodienthoai' => $request->phone,
                'roles' => $request->role,
            ]);

            return redirect()->back()->with('message', 'Thêm mới người dùng thành công!');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) {
                return redirect()->back()->withErrors(['username' => 'Tên đăng nhập đã tồn tại!']);
            }
            return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra. Vui lòng thử lại!']);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->username = $request->username;
            $user->email = $request->email;
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->hoten = $request->fullname;
            $user->sodienthoai = $request->phone;
            $user->roles = $request->role;
            $user->save();

            return redirect()->back()->with('message', 'Cập nhật người dùng thành công!');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) {
                return redirect()->back()->withErrors(['username' => 'Tên đăng nhập hoặc email đã tồn tại!']);
            }
            return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra. Vui lòng thử lại!']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('message', 'Đã xóa thành công');
    }
}