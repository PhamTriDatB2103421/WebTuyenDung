@extends('admin_layout')
@section('title')
    <title>{{ isset($vitri) ? 'Cập nhật vị trí tuyển dụng' : 'Thêm mới vị trí tuyển dụng' }}</title>
@endsection
@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                    action="{{ isset($vitri) ? route('admin.vitri.edit.update', $vitri->id) : route('admin.vitri.store') }}">
                    @csrf
                    @if (isset($vitri))
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <h4 class="card-title">{{ isset($vitri) ? 'Cập nhật' : 'Thêm mới' }}</h4>
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

                        <!-- Tên vị trí -->
                        <div class="form-group row">
                            <label for="tenvitri" class="col-sm-3 text-end control-label col-form-label">Tên vị trí</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('tenvitri') is-invalid @enderror"
                                    id="tenvitri" name="tenvitri" value="{{ old('tenvitri', $vitri->tenvitri ?? '') }}"
                                    placeholder="Nhập tên vị trí" required />
                                @error('tenvitri')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Mô tả -->
                        <div class="form-group row">
                            <label for="mota" class="col-sm-3 text-end control-label col-form-label">Mô tả</label>
                            <div class="col-sm-9">
                                <textarea class="form-control @error('mota') is-invalid @enderror"
                                    id="mota" name="mota" placeholder="Nhập mô tả" required>{{ old('mota', $vitri->mota ?? '') }}</textarea>
                                @error('mota')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Yêu cầu -->
                        <div class="form-group row">
                            <label for="yeucau" class="col-sm-3 text-end control-label col-form-label">Yêu cầu</label>
                            <div class="col-sm-9">
                                <textarea class="form-control @error('yeucau') is-invalid @enderror"
                                    id="yeucau" name="yeucau" placeholder="Nhập yêu cầu" required>{{ old('yeucau', $vitri->yeucau ?? '') }}</textarea>
                                @error('yeucau')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Đợt tuyển dụng -->
                        <div class="form-group row">
                            <label for="dot_id" class="col-sm-3 text-end control-label col-form-label">Đợt tuyển dụng</label>
                            <div class="col-sm-9">
                                <select class="form-select @error('dot_id') is-invalid @enderror" id="dot_id" name="dot_id" required>
                                    <option value="">Chọn đợt tuyển dụng</option>
                                    @foreach ($dots as $dot)
                                        <option value="{{ $dot->id }}"
                                            {{ isset($vitri) && old('dot_id', $vitri->dot_id) == $dot->id ? 'selected' : '' }}>
                                            {{ $dot->ten_dotungtuyen }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('dot_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="card-footer">
                        <div class="col-sm-12 text-end">
                            <button type="submit"
                                class="btn btn-primary">{{ isset($vitri) ? 'Cập nhật' : 'Thêm mới' }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
