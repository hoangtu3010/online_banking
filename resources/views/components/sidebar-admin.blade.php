<link rel="stylesheet" href="{{asset("css/sidebar-admin-style.css")}}">
<!-- CSS only -->

<div class="header-sidebar">
    <a href="{{url("/admin")}}" class="brand-link">
        <img src="{{url("imgs/logo.png")}}" alt="   Admin Logo" class="brand-image img-circle">
        <span class="brand-text"><i style="color: #fff; font-weight: 500; font-size: 1.2em">Fox</i> <i
                style="color: #f8911c; font-weight: 400; font-size: 1.2em">Banking</i></span>
    </a>
    <div class="user-panel mt-3 pb-3 mb-3">
        <div class="info">
            <a class="d-block">{{Auth::user()->name}}</a>
            <a class="brand-text">{{Auth::user()->email}}</a>
        </div>
        <div class="image">
            <img src="{{asset("dist/img/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">
        </div>
    </div>
    <!-- Sidebar user panel (optional) -->
</div>

<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="menu-sidebar mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

            <li class="nav-item">
                <a href="{{url("/admin")}}" class="nav-link nav-item-sidebar">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Home
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url("admin/mod")}}" class="nav-link nav-item-sidebar">
                    <i class="nav-icon fas fa-user-secret"></i>
                    <p>
                        Moderation
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url("admin/role")}}" class="nav-link nav-item-sidebar">
                    <i class="nav-icon far fa-building"></i>
                    <p>
                        Role
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url("admin/customer")}}" class="nav-link nav-item-sidebar">
                    <i class="nav-icon fas fa-address-book"></i>
                    <p>
                        Customers Information
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url("admin/bankAccount")}}" class="nav-link nav-item-sidebar">
                    <i class="nav-icon fas fa-credit-card"></i>
                    <p>
                        Bank Account
                    </p>
                </a>
            </li>
            <li class="nav-item menu-is-opening menu-open">
                <a href="#" class="nav-link" style="background-color: transparent">
                    <i class="nav-icon fas fa-blog"></i>
                    <p>
                        Blog
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: block;">
                    <li class="nav-item">
                        <a href="{{url("admin/blog/news")}}" class="nav-link nav-item-sidebar">
                            <i class="far fa-circle nav-icon"></i>
                            <p>News</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url("admin/blog/comments")}}" class="nav-link nav-item-sidebar">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Comments</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{url("/admin/calender")}}" class="nav-link nav-item-sidebar">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>
                        Calendar
                        <span class="badge badge-info right">2</span>
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>

<script>
    const currentLocation = location.href;
    const menuItem = document.querySelectorAll(".nav-item-sidebar")
    const menuLength = menuItem.length;
    for (let i=0; i<menuLength; i++){
        if (menuItem[i].href === currentLocation){
            menuItem[i].className += " active-sidebar"
        }
    }
</script>
