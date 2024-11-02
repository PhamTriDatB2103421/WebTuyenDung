@extends('admin_layout')
@section('title')
<title>{{ isset($user) ? 'Cập nhật người dùng' : 'Thêm mới người dùng' }}</title>
@endsection
@section('admin_content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ isset($user) ? route('admin.user.edit.update', $user->id) : route('admin.user.store') }}">
                @csrf
                @if(isset($user))
                    @method('PUT')
                @endif
                <div class="card-body">
                    <h4 class="card-title">{{ isset($user) ? 'Cập nhật' : 'Thêm mới' }}</h4>
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <!-- Username -->
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 text-end control-label col-form-label">Tên người dùng</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username ?? '') }}" placeholder="Nhập tên người dùng" required />
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 text-end control-label col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" placeholder="Nhập địa chỉ email" required />
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 text-end control-label col-form-label">Mật khẩu</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" {{ isset($user) ? '' : 'required' }} />
                            @if(isset($user))
                                <small class="form-text text-muted">Để trống nếu không muốn thay đổi mật khẩu</small>
                            @endif
                        </div>
                    </div>

                    <!-- Full Name -->
                    <div class="form-group row">
                        <label for="fullname" class="col-sm-3 text-end control-label col-form-label">Họ và tên</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fullname" name="fullname" value="{{ old('fullname', $user->hoten ?? '') }}" placeholder="Nhập họ và tên" required />
                        </div>
                    </div>

                    <!-- Phone Number -->
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 text-end control-label col-form-label">Số điện thoại</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->sodienthoai ?? '') }}" placeholder="Nhập số điện thoại" />
                        </div>
                    </div>

                    <!-- Role -->
                    <div class="form-group row">
                        <label for="role" class="col-sm-3 text-end control-label col-form-label">Vai trò</label>
                        <div class="col-sm-9">
                            <select class="form-select" id="role" name="role" required>
                                <option value="2" {{ (isset($user) && old('role', $user->roles) == 'admin') ? 'selected' : '' }}>Admin</option>
                                <option value="1" {{ (isset($user) && old('role', $user->roles) == 'user') ? 'selected' : '' }}>User</option>                                <!-- Thêm các vai trò khác nếu cần -->
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="card-footer">
                    <div class="col-sm-12 text-end">
                        <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Cập nhật' : 'Thêm mới' }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
