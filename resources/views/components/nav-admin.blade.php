<?php $feedback = \App\Models\Feedback::orderBy('id', 'DESC')->get() ?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url("/admin")}}" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">{{count($feedback)}}</span>
            </a>
            @if(count($feedback) > 0)
                <?php $i = 0 ?>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    @foreach($feedback as $item)
                        <?php $i++; ?>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{url("upload/default-customer.png")}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        {{$item->name}}
                                    </h3>
                                    <p class="text-sm">{{$item->message}}</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>{{$item->created_at}}</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                            @if($i == 3)
                                @break($feedback)
                            @endif
                    @endforeach
                <a href="#" class="dropdown-item dropdown-footer">See All Feedback</a>
            </div>
            @endif
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown" style=" border-left: 1px solid #ddd">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button">
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
