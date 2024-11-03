@extends('admin_layout')
@section('title')
    <title>Danh sách đợt ứng tuyển</title>
@endsection

@section('admin_content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="mb-2 text-gray-800 h3">Danh sách đợt ứng tuyển</h1>
        <p class="mb-4">Hiển thị toàn bộ danh sách đợt ứng tuyển</p>

        <!-- DataTales Example -->
        <div class="mb-4 shadow card">
            <div class="py-3 card-header">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách đợt ứng tuyển</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tên đợt ứng tuyển</th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th>Mô tả</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Tên đợt ứng tuyển</th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th>Mô tả</th>
                                <th>Thao tác</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if ($dotUngTuyens->isEmpty())
                                <h1>Danh sách rỗng</h1>
                            @else
                                @foreach ($dotUngTuyens as $dot)
                                    <tr>
                                        <td>{{ $dot->ten_dotungtuyen }}</td>
                                        <td>{{ \Carbon\Carbon::parse($dot->ngaybatdau)->format('d/m/Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($dot->ngayketthuc)->format('d/m/Y') }}</td>
                                        <td>{{ $dot->mo_ta }}</td>
                                        <td>
                                            <a href="{{ route('admin.dotungtuyen.edit_form', $dot->id) }}">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('admin.dotungtuyen.delete', $dot->id) }}">
                                                <i class="fa fa-times-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
