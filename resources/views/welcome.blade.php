<!doctype html>
<html lang="en">
<x-head/>
<link rel="stylesheet" href="{{asset("css/welcome.css")}}">
<body>
<section>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <img src="./public/imgs/logo.png" alt="#">
                </div>
                <div class="col-md-6"><ul class="nav justify-content-end">
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
    <div class="main">
        <div class="swiper-content">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">Slide 1</div>
                    <div class="swiper-slide">Slide 2</div>
                    <div class="swiper-slide">Slide 3</div>
                    <div class="swiper-slide">Slide 4</div>
                    <div class="swiper-slide">Slide 5</div>
                    <div class="swiper-slide">Slide 6</div>
                    <div class="swiper-slide">Slide 7</div>
                    <div class="swiper-slide">Slide 8</div>
                    <div class="swiper-slide">Slide 9</div>
                    <div class="swiper-slide">Slide 10</div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="distance">
                        <h2 class="text-center">Card Features and Benefits</h2>
                        <p class="text-center mb-5"><a>Blog</a></p>
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                        <div class="tuan">
                            <img src="./public/imgs/logo.png" alt="#">
                            <h3>surplus</h3>
                            <p>chuyển khoản</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="tuan">
                            <img src="./public/imgs/logo.png" alt="#">
                            <h3>surplus</h3>
                            <p>chuyển khoản</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="tuan">
                            <img src="./public/imgs/logo.png" alt="#">
                            <h3>surplus</h3>
                            <p>chuyển khoản</p>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="tuan">
                                <img src="./public/imgs/logo.png" alt="#">
                                <h3>surplus</h3>
                                <p>chuyển khoản</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="tuan">
                                <img src="./public/imgs/logo.png" alt="#">
                                <h3>surplus</h3>
                                <p>chuyển khoản</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="tuan">
                                <img src="./public/imgs/logo.png" alt="#">
                                <h3>surplus</h3>
                                <p>chuyển khoản</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h2 class="text-center">Contacts - About Us</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tuan">
                                <img src="./public/imgs/logo.png" alt="#">
                            </div>
                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<x-script/>
</html>
