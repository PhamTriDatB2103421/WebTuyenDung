@extends('admin_layout')
@section('title')
    <title>{{ isset($dotUngTuyen) ? 'Cập nhật đợt ứng tuyển' : 'Thêm mới đợt ứng tuyển' }}</title>
@endsection

@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                    action="{{ isset($dotUngTuyen) ? route('admin.dotungtuyen.edit.update', $dotUngTuyen->id) : route('admin.dotungtuyen.store') }}">
                    @csrf
                    @if (isset($dotUngTuyen))
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <h4 class="card-title">{{ isset($dotUngTuyen) ? 'Cập nhật' : 'Thêm mới' }}</h4>
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

                        <!-- Tên đợt ứng tuyển -->
                        <div class="form-group row">
                            <label for="ten_dotungtuyen" class="col-sm-3 text-end control-label col-form-label">Tên đợt ứng
                                tuyển</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('ten_dotungtuyen') is-invalid @enderror"
                                    id="ten_dotungtuyen" name="ten_dotungtuyen"
                                    value="{{ old('ten_dotungtuyen', $dotUngTuyen->ten_dotungtuyen ?? '') }}"
                                    placeholder="Nhập tên đợt ứng tuyển" required />
                                @error('ten_dotungtuyen')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Ngày bắt đầu -->
                        <div class="form-group row">
                            <label for="ngaybatdau" class="col-sm-3 text-end control-label col-form-label">Ngày bắt
                                đầu</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control @error('ngaybatdau') is-invalid @enderror"
                                    id="ngaybatdau" name="ngaybatdau"
                                    value="{{ old('ngaybatdau', $dotUngTuyen->ngaybatdau ?? '') }}" required />
                                @error('ngaybatdau')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Ngày kết thúc -->
                        <div class="form-group row">
                            <label for="ngayketthuc" class="col-sm-3 text-end control-label col-form-label">Ngày kết
                                thúc</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control @error('ngayketthuc') is-invalid @enderror"
                                    id="ngayketthuc" name="ngayketthuc"
                                    value="{{ old('ngayketthuc', $dotUngTuyen->ngayketthuc ?? '') }}" required />
                                @error('ngayketthuc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Mô tả -->
                        <div class="form-group row">
                            <label for="mo_ta" class="col-sm-3 text-end control-label col-form-label">Mô tả</label>
                            <div class="col-sm-9">
                                <textarea class="form-control @error('mo_ta') is-invalid @enderror" id="mo_ta" name="mo_ta" rows="4"
                                    placeholder="Nhập mô tả">{{ old('mo_ta', $dotUngTuyen->mo_ta ?? '') }}</textarea>
                                @error('mo_ta')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="card-footer">
                        <div class="col-sm-12 text-end">
                            <button type="submit"
                                class="btn btn-primary">{{ isset($dotUngTuyen) ? 'Cập nhật' : 'Thêm mới' }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
