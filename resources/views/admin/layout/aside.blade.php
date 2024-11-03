<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="mx-3 sidebar-brand-text">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="my-0 sidebar-divider">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Điều khiển</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Hệ thống
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
            aria-expanded="true" aria-controls="collapseUsers">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>Người dùng</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <h6 class="collapse-header">Quản lý người dùng</h6>
                <a class="collapse-item" href="{{ route('admin.user.list') }}">Danh sách người dùng</a>
                <a class="collapse-item" href="{{ route('admin.user.add_form') }}">Thêm người dùng</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDotUngTuyen"
            aria-expanded="true" aria-controls="collapseDotUngTuyen">
            <i class="fa fa-calendar-o" aria-hidden="true"></i>
            <span>Đợt ứng tuyển</span>
        </a>
        <div id="collapseDotUngTuyen" class="collapse" aria-labelledby="headingDotUngTuyen"
            data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <h6 class="collapse-header">Quản lý Đợt ứng tuyển</h6>
                <a class="collapse-item" href="{{ route('admin.dotungtuyen.list') }}">Danh sách Đợt ứng tuyển</a>
                <a class="collapse-item" href="{{ route('admin.dotungtuyen.add_form') }}">Thêm Đợt ứng tuyển</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseViTri"
            aria-expanded="true" aria-controls="collapseViTri">
            <i class="fa fa-tags" aria-hidden="true"></i>
            <span>Vị trí tuyển dụng</span>
        </a>
        <div id="collapseViTri" class="collapse" aria-labelledby="headingViTri"
            data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <h6 class="collapse-header">Quản lý Vị trí tuyển dụng</h6>
                <a class="collapse-item" href="{{ route('admin.vitri.list') }}">Danh sách Vị trí tuyển dụng</a>
                <a class="collapse-item" href="{{ route('admin.vitri.add_form') }}">Thêm Vị trí tuyển dụng</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="border-0 rounded-circle" id="sidebarToggle"></button>
    </div>


</ul>
