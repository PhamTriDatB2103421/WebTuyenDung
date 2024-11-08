@extends('user_layout')
@section('title')
    <title>Thông tin hồ sơ</title>
@endsection
@section('user_content')
    <div id="fh5co-main">
        <div class="fh5co-narrow-content">
            <div class="row row-bottom-padded-md">
                <h2>Tạo hồ sơ</h2>
                <form action="{{ route('user.profile.store') }}" method="POST">
                    @csrf

                    <!-- Tên -->
                    <div class="form-group">
                        <label for="hoten">Họ tên</label>
                        <input type="text" class="form-control @error('hoten') is-invalid @enderror" id="hoten"
                            name="hoten" value="{{ old('hoten') }}" required>
                        @error('hoten')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Ngày sinh -->
                    <div class="form-group">
                        <label for="date">Ngày sinh</label>
                        <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                            name="date" value="{{ old('date') }}" required>
                        @error('date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Giới tính -->
                    <div class="form-group">
                        <label for="sex">Giới tính</label>
                        <select class="form-control @error('sex') is-invalid @enderror" id="sex" name="sex"
                            required>
                            <option value="Nam" {{ old('sex') == 'male' ? 'selected' : '' }}>Nam</option>
                            <option value="Nữ" {{ old('sex') == 'female' ? 'selected' : '' }}>Nữ</option>
                        </select>
                        @error('sex')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Địa chỉ -->
                    <div class="form-group">
                        <label for="diachi">Địa chỉ</label>
                        <input type="text" class="form-control @error('diachi') is-invalid @enderror" id="diachi"
                            name="diachi" value="{{ old('diachi') }}" required>
                        @error('diachi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Số điện thoại -->
                    <div class="form-group">
                        <label for="sdt">Số điện thoại</label>
                        <input type="text" class="form-control @error('sdt') is-invalid @enderror" id="sdt"
                            name="sdt" value="{{ old('sdt') }}" required>
                        @error('sdt')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="mt-3 btn btn-primary">Tạo Hồ Sơ</button>
                </form>
            </div>
        </div>
    </div>
@endsection
