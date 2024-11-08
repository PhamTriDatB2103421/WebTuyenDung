@extends('user_layout')
@section('title')
    <title>Thông tin cá nhân</title>
@endsection
@section('user_content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (!isset($user))
        <div id="fh5co-main">
            <div class="fh5co-narrow-content">
                <div class="row row-bottom-padded-md">
                    <div class="card">
                        <div class="card-header">
                            Tài khoản chưa có hồ sơ
                        </div>
                        <div class="card-body">
                            <a href="{{ route('loivcl') }}">Tạo hồ sơ mới</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @else
        <div id="fh5co-main">
            <div class="fh5co-narrow-content">
                <div class="row row-bottom-padded-md">
                    <div class="card">
                        <div class="card-header">
                            Hồ sơ của {{ $user->hoten }}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>Họ tên:</strong> {{ $user->hoten }}
                                </div>
                                <div class="col-md-4">
                                    <strong>Ngày sinh:</strong>
                                    {{ \Carbon\Carbon::parse($user->ngaysinh)->format('d/m/Y') }}
                                </div>
                                <div class="col-md-4">
                                    <strong>Giới tính:</strong>
                                    {{ $user->gioitinh == 'male' ? 'Nam' : ($user->gioitinh == 'female' ? 'Nữ' : 'Khác') }}
                                </div>
                            </div>
                            <div class="mt-3 row">
                                <div class="col-md-6">
                                    <strong>Địa chỉ:</strong> {{ $user->diachi }}
                                </div>
                                <div class="col-md-6">
                                    <strong>Email:</strong> {{ $user->email }}
                                </div>
                            </div>
                            <div class="mt-3 row">
                                <div class="col-md-6">
                                    <strong>Số điện thoại:</strong> {{ $user->sodienthoai }}
                                </div>
                            </div>
                            <!-- Hiển thị nút sửa hồ sơ -->
                            <div class="mt-4">
                                <a href="{{ route('user.profile.edit', $user->id) }}" class="btn btn-warning">Chỉnh sửa</a>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('user.don.list', Auth::user()->id) }}" class="btn btn-warning">Xem hồ sơ
                                    đã
                                    nộp</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endif
@endsection
