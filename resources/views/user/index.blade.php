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
                            <h3>Strategy</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
                        <div class="fh5co-icon">
                            <i class="icon-search4"></i>
                        </div>
                        <div class="fh5co-text">
                            <h3>Explore</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
                        <div class="fh5co-icon">
                            <i class="icon-paperplane"></i>
                        </div>
                        <div class="fh5co-text">
                            <h3>Direction</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="fh5co-feature animate-box" data-animate-effect="fadeInLeft">
                        <div class="fh5co-icon">
                            <i class="icon-params"></i>
                        </div>
                        <div class="fh5co-text">
                            <h3>Expertise</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. </p>
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

        <div id="get-in-touch">
            <div class="fh5co-narrow-content">
                <div class="row">
                    <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                        <h1 class="fh5co-heading-colored">Get in touch</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                        <p class="fh5co-lead">Separated they live in Bookmarksgrove right at the coast of the Semantics, a
                            large language ocean.</p>
                        <p><a href="#" class="btn btn-primary">Learn More</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
