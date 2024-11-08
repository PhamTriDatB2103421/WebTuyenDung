@extends('admin_layout')
@section('title')
    <title>Danh sách vị trí tuyển dụng</title>
@endsection
@section('admin_content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="mb-2 text-gray-800 h3">Danh sách vị trí tuyển dụng</h1>
        <p class="mb-4">Hiển thị toàn bộ danh sách vị trí tuyển dụng</p>

        <!-- DataTales Example -->
        <div class="mb-4 shadow card">
            <div class="py-3 card-header">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách vị trí tuyển dụng</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tên vị trí</th>
                                <th>Mô tả</th>
                                <th>Yêu cầu</th>
                                <th>Đợt tuyển dụng</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Tên vị trí</th>
                                <th>Mô tả</th>
                                <th>Yêu cầu</th>
                                <th>Đợt tuyển dụng</th>
                                <th>Thao tác</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($vitris as $vitri)
                                <tr>
                                    <td>{{ $vitri->tenvitri }}</td>
                                    <td>{{ $vitri->mota }}</td>
                                    <td>{{ $vitri->yeucau }}</td>
                                    <td>{{ $vitri->dotTuyenDung->ten_dotungtuyen ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('admin.vitri.edit_form', $vitri->id) }}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.don.list', $vitri->id) }}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.vitri.delete', $vitri->id) }}">
                                            <i class="fa fa-times-circle"></i>
                                        </a>
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
