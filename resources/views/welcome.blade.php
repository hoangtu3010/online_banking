<!doctype html>
<html lang="en">
<x-head/>
<link rel="stylesheet" href="{{asset("css/welcome.css")}}">
<body>
<section>
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
    <div class="main">
        <div class="swiper-content">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                           <div class="box-content">
                               <h3>
                                   Card Features and Benefits
                                   More Features
                               </h3>
                               <p>Proin sed felis ultrices, tristique eros eu, accumsan justo.</p>
                               <button class="btn btn-primary">More Features</button>

                           </div>
                            <img src="{{url("imgs/Untitled.png")}}" alt="">
                    </div>

                    <div class="swiper-slide">
                        <div class="box-content">
                            <h3>
                                Card Features and Benefits
                                More Features
                            </h3>
                            <p>Proin sed felis ultrices, tristique eros eu, accumsan justo.</p>
                            <button class="btn btn-primary">More Features</button>
                        </div>
                        <img class="img-visa" src="{{url("imgs/slider-img-3.jpg")}}" alt="">
                        <img class="bank" src="{{url("imgs/phong.png")}}" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="box-content2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="distance">
                            <h2 class="text-center">Card Features and Benefits</h2>
                            <p class="text-center mb-5"><a>Blog</a></p>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="tuan text-center">
                                    <img src="{{url("imgs/006-growth (1).jpg")}}" alt="">
                                    <h3>surplus</h3>
                                    <p>chuyển khoản</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="tuan text-center">
                                    <img src="{{url("imgs/007-profits.jpg")}}" alt="">
                                    <h3>Change</h3>
                                    <p>chuyển khoản</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="tuan text-center">
                                    <img src="{{url("imgs/009-worldwide.jpg")}}" alt="">
                                    <h3>Infomation</h3>
                                    <p>chuyển khoản</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="tuan text-center">
                                    <img src="{{url("imgs/010-cash.jpg")}}" alt="">
                                    <h3>surplus</h3>
                                    <p>chuyển khoản</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="tuan text-center">
                                    <img src="{{url("imgs/011-money-2.jpg")}}" alt="">
                                    <h3>History</h3>
                                    <p>chuyển khoản</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="tuan text-center">
                                    <img src="{{url("imgs/027-business-7.jpg")}}" alt="">
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
                                <div class="tuan text-center>
                                    <img src="{{url("imgs/logo.png")}}" alt="">
                                </div>
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
