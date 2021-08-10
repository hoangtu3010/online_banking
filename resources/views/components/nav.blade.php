<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url("/user")}}" class="nav-link">Home</a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button" style="margin-top: 5px">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown" style=" border-left: 1px solid #ddd">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" >
                <i class="far fa-user-circle" style="font-size: 25px;"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-sm-right dropdown-menu-right">
                <a href="{{ asset("/user/profile")}}" class="dropdown-item" style="text-align: center">
                    <i class="far fa-address-card mr-2"></i> Profile
                </a>
                <form method="POST" class="dropdown-item text-center" action="{{ route('logout') }}">
                    @csrf
                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        <i class="ion ion-log-out mr-2"></i>
                        {{ __('Log Out') }}
                    </x-jet-dropdown-link>
                </form>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
