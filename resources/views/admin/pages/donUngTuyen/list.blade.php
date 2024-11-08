@extends('admin_layout')
@section('title')
    <title>Danh sách đơn đã nộp vào bài viết</title>
@endsection
@section('admin_content')
    <div class="container-fluid">
        <h1 class="mb-2 text-gray-800 h3">Danh sách Đơn đã nộp vào bài viết</h1>
        <p class="mb-4">Hiển thị toàn bộ danh sách Đơn đã nộp vào bài viết</p>

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
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Vị trí Tuyển dụng</th>
                                <th>Trạng thái</th>
                                <th>Ngày nộp đơn</th>
                                <th>Tên người nộp</th>
                                <th>Ghi chú</th>
                                <th>Thao tác</th>
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
                                    <td>
                                        <a href="{{ route('admin.don.edit', $don->id) }}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.don.delete', $don->id) }}"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $don->id }}').submit();">
                                            <i class="fa fa-times-circle"></i>
                                        </a>
                                        <form id="delete-form-{{ $don->id }}"
                                            action="{{ route('admin.don.delete', $don->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('GET') <!-- Hoặc có thể sử dụng phương thức POST nếu cần -->
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
