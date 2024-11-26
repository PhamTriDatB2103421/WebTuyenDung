@extends('user_layout')
@section('title')
    <title>Cập nhật thông tin</title>
@endsection
@section('user_content')
    <div id="fh5co-main">
        <div class="fh5co-narrow-content">
            <div class="row row-bottom-padded-md">
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
                <h2>Chỉnh sửa thông tin hồ sơ</h2>

                <form action="{{ route('user.profile.update', $user->id) }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label for="hoten">Họ tên</label>
                        <input type="text" class="form-control" id="hoten" name="hoten" value="{{ $user->hoten }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="date">Ngày sinh</label>
                        <input type="date" class="form-control" id="date" name="date"
                            value="{{ $user->ngaysinh }}" required>
                    </div>

                    <div class="form-group">
                        <label for="sex">Giới tính</label>
                        <select class="form-control" id="sex" name="sex" required>
                            <option value="male" {{ $user->gioitinh == 'male' ? 'selected' : '' }}>Nam</option>
                            <option value="female" {{ $user->gioitinh == 'female' ? 'selected' : '' }}>Nữ</option>
                            <option value="other" {{ $user->gioitinh == 'other' ? 'selected' : '' }}>Khác</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="diachi">Địa chỉ</label>
                        <input type="text" class="form-control" id="diachi" name="diachi" value="{{ $user->diachi }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="sdt">Số điện thoại</label>
                        <input type="text" class="form-control" id="sdt" name="sdt"
                            value="{{ $user->sodienthoai }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection
