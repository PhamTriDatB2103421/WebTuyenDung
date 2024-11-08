@extends('user_layout')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('user_content')
    <div id="fh5co-main">
        <div class="fh5co-narrow-content">
            <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Bài tuyên dụng gần đây</h2>
            <div class="row row-bottom-padded-md">
                @foreach ($baiViets as $baiViet)
                    <div class="col-md-3 col-sm-6 col-padding animate-box" data-animate-effect="fadeInLeft">
                        <div class="blog-entry">
                            <a href="{{ route('user.baiviet', $baiViet->id) }}" class="blog-img">
                                <img src="{{ asset('storage/uploads/hinh_anh/' . $baiViet->hinhAnhBaiViets->first()->LinkAnh) }}"
                                    alt="Hình ảnh bài viết" width="100">
                            </a>
                            <div class="desc">
                                <h3><a href="{{ route('user.baiviet', $baiViet->id) }}">{{ $baiViet->tieu_de }}</a></h3>
                                <a href="{{ route('user.baiviet', $baiViet->id) }}" class="lead">Tham khảo thêm
                                    <i class="icon-arrow-right3"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
