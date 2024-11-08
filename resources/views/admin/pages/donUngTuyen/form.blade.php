@extends('admin_layout')
@section('title')
    <title>Cập nhật đơn ứng tuyển</title>
@endsection

@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                    action="{{ route('admin.don.update', $don->id) }}">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Cập nhật</h4>
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
                            <label for="ten_dotungtuyen" class="col-sm-3 text-end control-label col-form-label">Vị trí ứng
                                tuyển</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $don->viTriTuyenDung->tenvitri }}"
                                    required readonly />
                            </div>
                        </div>

                        <!-- Ngày bắt đầu -->
                        <div class="form-group row">
                            <label for="ngaybatdau" class="col-sm-3 text-end control-label col-form-label">Tên người ứng
                                tuyển</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $don->nguoiUngTuyen->hoten }}" required
                                    readonly />
                            </div>
                        </div>

                        <!-- Ngày kết thúc -->
                        <div class="form-group row">
                            <label for="ngayketthuc" class="col-sm-3 text-end control-label col-form-label">Ngày nộp
                                đơn</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control"
                                    value="{{ \Carbon\Carbon::parse($don->ngay_nop_don)->format('Y-m-d') }}" required
                                    readonly />

                            </div>
                        </div>

                        <!-- Mô tả -->
                        <div class="form-group row">
                            <label for="mo_ta" class="col-sm-3 text-end control-label col-form-label">Ghi chú</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" placeholder="Nhập mô tả" readonly>{{ $don->ghichu }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="trang_thai_phong_van" class="col-sm-3 text-end control-label col-form-label">Trạng
                                thái phỏng vấn</label>
                            <div class="col-sm-9">
                                <!-- Thẻ select cho phép chọn nhiều lựa chọn -->
                                <select class="form-select" id="role" name="trangThai" required>
                                    @foreach ($trangThaiPhongVan as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('trangThai', $don->trangThai->id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->ten_trangthai }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                    </div>

                    <!-- Submit Button -->
                    <div class="card-footer">
                        <div class="col-sm-12 text-end">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
