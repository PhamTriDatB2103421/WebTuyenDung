<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
<aside id="fh5co-aside" role="complementary" class="border js-fullheight">


    <h1 id="fh5co-logo"><a href="index.html">Marble</a></h1>
    <nav id="fh5co-main-menu" role="navigation">
        <ul>
            <li><a href="{{ route('index') }}">Trang chủ</a></li>
            <li><a href="{{ route('user.baiviet.list') }}">Bài tuyển dụng</a></li>
            <li><a href="about.html">Về chúng tôi</a></li>
            <li><a href="contact.html">Liên hệ</a></li>
            @if (Auth::check())
                @php
                    $user = Auth::user();
                @endphp
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        {{ $user->hoten }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('user.profile', $user->id) }}">Thông tin cá nhân</a></li>
                        @if ($user->roles == 2)
                            <li><a href="{{ route('admin.pages.index') }}">Giao diện quản lý</a></li>
                        @endif
                        <li><a href="{{ route('logout') }}"">Đăng xuất</a></li>
                    </ul>
                </li>
            @else
                <li><a href="{{ route('login') }}">Đăng nhập</a></li>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif



        </ul>
    </nav>

</aside>
