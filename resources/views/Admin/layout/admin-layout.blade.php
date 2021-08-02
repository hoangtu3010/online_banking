<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-head/>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{url("imgs/logo.png")}}" alt="AdminLTELogo" height="60" width="60">
    </div>

    <x-nav/>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{url("/admin")}}" class="brand-link">
            <img src="{{url("imgs/logo.png")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Online Banking</span>
        </a>

        <x-sidebar/>
    </aside>

    @yield("main")
    <x-footer/>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>
</body>

<x-script/>

</html>
