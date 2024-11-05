@extends('admin_layout')
@section('title')
    <title>Thêm bài viết</title>
@endsection
@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form method="POST" action="{{ route('admin.baiviet.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Thêm bài viết</h4>

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

                        <!-- Tiêu đề -->
                        <div class="form-group row">
                            <label for="tieu_de" class="col-sm-3 text-end control-label col-form-label">Tiêu đề</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('tieu_de') is-invalid @enderror"
                                    id="tieu_de" name="tieu_de" required />
                                @error('tieu_de')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Nội dung -->
                        <div class="form-group row">
                            <label for="noi_dung" class="col-sm-3 text-end control-label col-form-label">Nội dung</label>
                            <div class="col-sm-9">
                                <textarea class="form-control @error('noi_dung') is-invalid @enderror" id="noi_dung" name="noi_dung" required>{{ old('noi_dung') }}</textarea>
                                @error('noi_dung')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Người dùng -->
                        <div class="form-group row">
                            <label for="nguoi_dung_id" class="col-sm-3 text-end control-label col-form-label">Người
                                dùng</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ Auth::user()->hoten }}" readonly>
                            </div>
                        </div>

                        <!-- Vị trí tuyển dụng -->
                        <div class="form-group row">
                            <label for="vi_tri_tuyen_dung_id" class="col-sm-3 text-end control-label col-form-label">Vị trí
                                tuyển dụng</label>
                            <div class="col-sm-9">
                                <select class="form-select @error('vi_tri_tuyen_dung_id') is-invalid @enderror"
                                    id="vi_tri_tuyen_dung_id" name="vi_tri_tuyen_dung_id" required>
                                    @foreach ($viTriTuyenDungs as $viTri)
                                        <option value="{{ $viTri->id }}">{{ $viTri->tenvitri }}</option>
                                    @endforeach
                                </select>
                                @error('vi_tri_tuyen_dung_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Hình ảnh -->
                        <div class="form-group row">
                            <label for="hinh_anh" class="col-sm-3 text-end control-label col-form-label">Hình ảnh</label>
                            <div class="col-sm-9" id="image-inputs-container">
                                <input type="file" class="form-control @error('hinh_anh') is-invalid @enderror"
                                    id="hinh_anh_0" name="hinh_anh[]" multiple />
                                @error('hinh_anh')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="button" class="btn btn-secondary" onclick="addImageInput()">Thêm hình
                                    ảnh</button>
                            </div>
                        </div>

                        <script>
                            let imageInputCount = 1; // Đếm số lượng input hình ảnh đã thêm

                            function addImageInput() {
                                // Tạo một input file mới
                                const newInput = document.createElement('input');
                                newInput.type = 'file';
                                newInput.name = 'hinh_anh[]'; // Đảm bảo tên giống như trong form
                                newInput.classList.add('form-control', 'mt-2'); // Thêm lớp CSS
                                newInput.id = 'hinh_anh_' + imageInputCount; // Đặt id cho input mới

                                // Thêm input mới vào container
                                document.getElementById('image-inputs-container').appendChild(newInput);

                                // Tăng biến đếm
                                imageInputCount++;
                            }
                        </script>


                    </div>
                    <div class="card-footer">
                        <div class="col-sm-12 text-end">
                            <button type="submit" class="btn btn-primary">Thêm bài viết</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
