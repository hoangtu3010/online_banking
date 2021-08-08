<header>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-2 scrolling ">
                <img src="{{ url('imgs/logo.png') }}" alt="">
            </div>
            <div class="col-md-6">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">contacts</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <form class="d-flex">
                    <button class="btn btn-outline-success" type="submit">
                        <div class="">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary">Dashboard</a>
                            @else
                                <a style="color: green;margin-right: 15px;width: 40px;height: 15px" href="{{ route('login') }}"
                                   class="">
                                    Đăng nhập </a>
                                |
                                @if (Route::has('register'))
                                    <a style="color: green;margin-left: 15px" href="{{ route('register') }}" class="">Đăng Ký</a>
                                @endif
                            @endauth
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>

