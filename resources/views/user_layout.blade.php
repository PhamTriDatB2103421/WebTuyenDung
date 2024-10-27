<!DOCTYPE html>
<html class="no-js">
    @include('user.layout.head')
    <body>
        <div id="fh5co-page">
            @include('user.layout.aside')

            @yield('user_content')
        </div>
        @include('user.layout.script')
    </body>
    </html>
