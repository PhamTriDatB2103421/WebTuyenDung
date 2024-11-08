@extends('user_layout')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('user_content')
    <div id="fh5co-main">
        <div class="fh5co-narrow-content">
            <div class="row row-bottom-padded-md">
                <div class="mb-4 shadow card">
                    <div class="py-3 card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Danh sách Đơn đã nộp vào bài viết</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Vị trí Tuyển dụng</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày nộp đơn</th>
                                        <th>Tên người nộp</th>
                                        <th>Ghi chú</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Vị trí Tuyển dụng</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày nộp đơn</th>
                                        <th>Tên người nộp</th>
                                        <th>Ghi chú</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($dons as $don)
                                        <tr>
                                            <td>{{ $don->viTriTuyenDung->tenvitri }}</td>
                                            <td>{{ $don->trangThai->ten_trangthai }}</td>
                                            <td>{{ $don->ngay_nop_don }}</td>
                                            <td>{{ $don->nguoiUngTuyen->hoten }}</td>
                                            <td>{{ $don->ghichu }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
