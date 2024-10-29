@extends('admin_layout')
@section('title')
<title>Danh sách user</title>
@endsection
@section('admin_content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách người dùng</h1>
    <p class="mb-4">Hiển thị toàn bộ danh sách người dùng với quyền 1 là user, 2 là admin</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách người dùng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Họ Tên</th>
                            <th>Số điện thoại</th>
                            <th>Quyền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Email</th>
                            <th>Họ Tên</th>
                            <th>Số điện thoại</th>
                            <th>Quyền</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($all_users as $user)
                        <tr>
                            <th>{{ $user->email }}</th>
                            <th>{{ $user->hoten }}</th>
                            <th>{{ $user->sodienthoai }}</th>
                            <th>{{ $user->roles }}</th>
                            <th>
                                    <a href="{{ route('admin.user.edit_form', $user->id) }}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('admin.user.delete', $user->id) }}">
                                        <i class="fa fa-times-circle"></i>
                                    </a>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
