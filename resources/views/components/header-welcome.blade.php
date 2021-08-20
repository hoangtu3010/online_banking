<header id="header_welcome">
    <div class="container">
        <div class="row">
            <div class="logo-header col-md-2 mt-1">
                <a href="{{url("/")}}">
                    <img src="{{ url('imgs/logo.png') }}" alt="logo"> <span><i style="color: #333; font-weight: 500; font-size: 1.2em">Fox</i> <i style="color: #95a5a6; font-weight: 400; font-size: 1.2em">Banking</i></span>
                </a>
            </div>
            <div class="col-md-7" style="margin-top: 10px">
                <ul id="nav-welcome" class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link nav-link-wel" aria-current="page" href="{{url("/")}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-wel" href="{{url("/blog")}}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-wel" href="{{url("/about-us")}}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-wel" href="{{url("/contact-us")}}">Contact Us</a>
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

<script>
    const currentLocation = location.href;
    const menuItem = document.querySelectorAll(".nav-link-wel")
    const menuLength = menuItem.length;
    for (let i=0; i<menuLength; i++){
        if (menuItem[i].href === currentLocation){
            menuItem[i].className += " is-active"
        }
    }

</script>

