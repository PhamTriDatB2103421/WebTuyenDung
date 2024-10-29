<!DOCTYPE html>
<html lang="en">
@include('admin.layout.head')
    <body id="page-top">
        <div id="wrapper">
            @include('admin.layout.aside')
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    @include('admin.layout.nav')
                    @yield('admin_content')

                </div>
                @include('admin.layout.footer')
            </div>
        </div>
        @include('admin.layout.script')
    </body>
</html>

