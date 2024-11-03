<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
<aside id="fh5co-aside" role="complementary" class="border js-fullheight">


    <h1 id="fh5co-logo"><a href="index.html">Marble</a></h1>
    <nav id="fh5co-main-menu" role="navigation">
        <ul>
            <li class="fh5co-active"><a href="index.html">Home</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li><a href="portfolio.html">Portfolio</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>
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
                        <li><a href="{{ route('logout') }}"">Đăng xuất</a></li>
                    </ul>
                </li>
            @else
                <li><a href="{{ route('login') }}">Đăng nhập</a></li>
            @endif



        </ul>
    </nav>

</aside>
