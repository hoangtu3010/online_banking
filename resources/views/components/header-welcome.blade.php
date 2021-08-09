<header id="header_welcome">
    <div class="container">
        <div class="row">
            <div class="logo-header col-md-2 mt-1">
                <a href="{{url("/")}}">
                    <img src="{{ url('imgs/logo.png') }}" alt="logo">
                    <div class="bg-icon-logo"></div>
                </a>
            </div>
            <div class="col-md-7" style="margin-top: 10px">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{url("/")}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{url("/blog")}}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url("/about-us")}}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{url("/contact-us")}}">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <form class="d-flex" style="justify-content: flex-end">
                    <div class="btn-in-up">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary">Dashboard</a>
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="">
                                Login </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="">Register</a>
                            @endif
                        @endauth
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>

