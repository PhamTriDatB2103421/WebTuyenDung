@extends('admin_layout')
@section('title')
    <title>Danh sách bài viết</title>
@endsection
@section('admin_content')
    <div class="container-fluid">
        <h1 class="mb-2 text-gray-800 h3">Danh sách bài viết</h1>
        <p class="mb-4">Hiển thị toàn bộ danh sách bài viết</p>

        <div class="mb-4 shadow card">
            <div class="py-3 card-header">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách bài viết</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tiêu đề</th>
                                <th>Nội dung</th>
                                <th>Ngày đăng</th>
                                <th>Tác giả</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Tiêu đề</th>
                                <th>Nội dung</th>
                                <th>Ngày đăng</th>
                                <th>Tác giả</th>
                                <th>Thao tác</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($baiviets as $baiviet)
                                <tr>
                                    <td>{{ $baiviet->tieu_de }}</td>
                                    <td>{!! Str::limit($baiviet->noi_dung, 50) !!}</td>
                                    <td>{{ $baiviet->ngay_dang }}</td>
                                    <td>{{ $baiviet->user->hoten }}</td>
                                    <td>
                                        <a href="{{ route('admin.baiviet.edit_form', $baiviet->id) }}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.baiviet.delete', $baiviet->id) }}"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $baiviet->id }}').submit();">
                                            <i class="fa fa-times-circle"></i>
                                        </a>
                                        <form id="delete-form-{{ $baiviet->id }}"
                                            action="{{ route('admin.baiviet.delete', $baiviet->id) }}" method="POST"
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
