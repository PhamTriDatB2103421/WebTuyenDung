@extends('user_layout')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('user_content')
    <div id="fh5co-main">
        <aside id="fh5co-hero" class="js-fullheight">
            <div class="flexslider js-fullheight">
                <ul class="slides">
                    <li style="background-image: url({{ asset('FrontEnd/images/bg_1.png') }});">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="text-center col-md-8 col-md-offset-2 js-fullheight slider-text">
                                    <div class="slider-text-inner">
                                        <h1>Tuyển dụng!! <strong></strong> Nhiều vị trí phù hợp đang chờ bạn ứng tuyển</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url({{ asset('FrontEnd/images/bg_2.jpg') }});">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="text-center col-md-8 col-md-offset-2 js-fullheight slider-text">
                                    <div class="slider-text-inner">
                                        <h1>Chúng tôi rất vui nếu có cơ hội làm việc chung với bạn</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style="background-image: url({{ asset('FrontEnd/images/bg_3.png') }});">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="text-center col-md-8 col-md-offset-2 js-fullheight slider-text">
                                    <div class="slider-text-inner">
                                        <h1>Hãy trở thành một đồng đội của chúng tôi</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="fh5co-narrow-content">
            <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Services</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
                        <div class="fh5co-icon">
                            <i class="icon-settings"></i>
                        </div>
                        <div class="fh5co-text">
                            <h3>Tìm việc chưa bao giờ dễ thương đến thế!</h3>
                            <p> Nơi hội tụ những cơ hội xịn sò và giúp bạn bước tới thành công với nụ cười trên môi. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
                        <div class="fh5co-icon">
                            <i class="icon-search4"></i>
                        </div>
                        <div class="fh5co-text">
                            <h3>Chào mừng bạn đến với ngôi nhà chung!</h3>
                            <p>Chúng tôi không chỉ là trang tuyển dụng, mà còn là bệ phóng sự nghiệp cho bạn tỏa sáng. </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
                        <div class="fh5co-icon">
                            <i class="icon-paperplane"></i>
                        </div>
                        <div class="fh5co-text">
                            <h3>Công việc lý tưởng của bạn ở ngay đây!</h3>
                            <p>Hãy để chúng tôi kết nối bạn với những cơ hội đỉnh cao và đồng hành trên mọi chặng đường sự
                                nghiệp. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
                        <div class="fh5co-icon">
                            <i class="icon-params"></i>
                        </div>
                        <div class="fh5co-text">
                            <h3>Tương lai trong tầm tay bạn!</h3>
                            <p>Duyệt qua hàng ngàn công việc, chọn ngay một cơ hội và biến giấc mơ thành hiện thực. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fh5co-narrow-content">
            <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Bài tuyển dụng gần đây</h2>
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
