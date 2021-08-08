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
                        <img class="img-visa" src="{{url("imgs/slider-img-2.jpg")}}" alt="">

                        <img src="{{url("imgs/phong.jpg")}}" alt="">
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
                        <img class="bank" src="{{url("imgs/phong.jpg")}}" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="box-content2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="distance">
                            <h2 class="text-center">News</h2>
                            <div class="row">
                                <?php $i = 0 ?>
                                @foreach($news as $item)
                                        <?php $i++ ?>
                                    <div class="col-md-4 blog-item">
                                        <div class="post-image">
                                            <img src="{{$item->getImage()}}" alt="img" width="100%" height="215px">
                                            <div class="mask"></div>
                                            <a class="post-icons">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </a>
                                        </div>
                                        <div class="post-header">
                                            <h3 class="post-title">
                                                <a href="">{{$item->title}}</a>
                                            </h3>
                                            <div class="post-meta">
                                            <span class="post-meta-item post-author">
                                                <a>{{$item->author}}</a>
                                            </span>
                                                <span class="post-meta-item post-date">
                                                <a>{{$item->created_at}}</a>
                                            </span>
                                                <span class="post-meta-item post-comments">
                                                    <?php $count = 0; ?>
                                                    @foreach($comments as $cmt)
                                                        @if($item->id == $cmt->new_id)
                                                            <?php $count++; ?>
                                                        @endif
                                                    @endforeach

                                                <a>{{$count}} Comments</a>
                                            </span>
                                            </div>
                                            <div class="post-content">
                                                <div class="post-content-inner">
                                                    <p class="text-content">
                                                        {{$item->content}}
                                                    </p>
                                                    <p style="margin-top: 25px">
                                                        <a class="more-click" href="#">
                                                            Read More
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                            @if($i == 3)
                                                @break($news);
                                            @endif
                                @endforeach
                            </div>
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
