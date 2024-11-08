@extends('user_layout')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('user_content')
    <div id="fh5co-main">
        <div class="fh5co-narrow-content">
            <div class="row row-bottom-padded-md">
                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                    <img class="img-responsive"
                        src="{{ asset('storage/uploads/hinh_anh/' . $baiViet->hinhAnhBaiViets->first()->LinkAnh) }}"
                        alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
                </div>
                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                    <h2 class="fh5co-heading">{{ $baiViet->tieu_de }}</h2>
                    <div class="fh5co-narrow-content">
                        <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Yêu cầu cơ bản</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
                                    <div class="fh5co-icon">
                                        <i class="icon-settings"></i>
                                    </div>
                                    <div class="fh5co-text">
                                        <h3>{{ $baiViet->viTriTuyenDung->tenvitri }}</h3>
                                        <p>{{ $baiViet->viTriTuyenDung->mota }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
                                    <div class="fh5co-icon">
                                        <i class="icon-params"></i>
                                    </div>
                                    <div class="fh5co-text">
                                        <h3>Thời gian tuyển dụng</h3>
                                        @if ($baiViet->viTriTuyenDung && $baiViet->viTriTuyenDung->dotTuyenDung)
                                            <p>Ngày bắt đầu: {{ $baiViet->viTriTuyenDung->dotTuyenDung->ngaybatdau }}</p>
                                            <p>Ngày kết thúc: {{ $baiViet->viTriTuyenDung->dotTuyenDung->ngayketthuc }}</p>
                                        @else
                                            <p>Không có thông tin tuyển dụng.</p>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fh5co-narrow-content">
            {!! $baiViet->noi_dung !!}
        </div>

        <div class="fh5co-narrow-content">
            <div class="row">
                <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                    <h1 class="fh5co-heading-colored">Cảm thấy thích hợp với bản thân</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                    <p class="fh5co-lead">Nộp đơn ứng tuyển tại đây.</p>
                    <a href="{{ route('user.baiviet.nop', [Auth::id(), $baiViet->id]) }}" class="btn btn-primary">Nộp Đơn</a>
                </div>

            </div>
        </div>
    </div>
@endsection
