<!DOCTYPE html>
<html>

<!-- Head -->

<head>

    <title>Đăng Nhập</title>

    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords"
        content="Existing Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //Meta-Tags -->

    <link href="{{ asset('login/css/popuo-box.css" rel="stylesheet') }}" type="text/css" media="all" />

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('login/css/style.css') }}" type="text/css" media="all">

    <!-- Fonts -->
    <link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <!-- //Fonts -->

</head>
<!-- //Head -->

<!-- Body -->

<body>

    <h1>Đơn đăng ký</h1>

    <div class="w3layoutscontaineragileits">
        <h2>Đăng ký</h2>
        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="form-sub-w3ls">
                <input placeholder="Email" name="email" class="mail" type="email" required="">
                <div class="icon-agile">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                </div>
            </div>
            <div class="form-sub-w3ls">
                <input placeholder="Họ tên" name="name" class="mail" type="text" required="">
                <div class="icon-agile">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                </div>
            </div>
            <div class="form-sub-w3ls">
                <input placeholder="Số điện thoại" name="phone" class="mail" type="text" required="">
                <div class="icon-agile">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                </div>
            </div>
            <div class="form-sub-w3ls">
                <input placeholder="Mật khẩu" type="password" required="">
                <div class="icon-agile">
                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                </div>
            </div>
            <div class="form-sub-w3ls">
                <input placeholder="Xác nhận mật khẩu" name="password" type="password" required="">
                <div class="icon-agile">
                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                </div>
            </div>
            <div class="login-check">
                <label class="checkbox"><input type="checkbox" name="checkbox" checked="">Tôi đồng ý chấp nhận mọi
                    điều khoản</label>
            </div>
            <div class="submit-w3l">
                <input type="submit" value="ĐĂNG KÝ">
            </div>
        </form>
    </div>

    <script type="text/javascript" src="{{ asset('login/js/jquery-2.1.4.min.js') }}"></script>

    <!-- pop-up-box-js-file -->
    <script src="{{ asset('login/js/jquery.magnific-popup.js') }}" type="text/javascript"></script>
    <!--//pop-up-box-js-file -->
    <script>
        $(document).ready(function() {
            $('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });

        });
    </script>
    <script></script>
</body>
<!-- //Body -->

</html>
