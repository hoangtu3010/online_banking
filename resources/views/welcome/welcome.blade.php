<link rel="stylesheet" href="{{asset("css/welcome.css")}}">
@extends("welcome.layout-welcome")
@section("main")

    <div class="main">
        <button id="scrollToTopBtn">
            <i class="ion-chevron-up"></i>
        </button>

        <div class="banner-header">
            <div class="banner-image">
                <img class="" src="{{url("/imgs/slider-img-2.jpg")}}" alt="img">
            </div>
            <div style="padding-left: 200px">
                <div class="banner-text">
                    <h1 class="banner-text-header">All the benefits of Card, on the website</h1>
                    <h3 class="banner-text-footer">Personalize your results in a few <br> simple steps</h3>
                </div>
                <div class="banner-register">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="">Register Now </a>
                    @endif
                </div>
            </div>
            <div class="bubbles">
                <img src="{{url("imgs/bubble.png")}}" alt="bubble">
                <img src="{{url("imgs/bubble.png")}}" alt="bubble">
                <img src="{{url("imgs/bubble.png")}}" alt="bubble">
                <img src="{{url("imgs/bubble.png")}}" alt="bubble">
                <img src="{{url("imgs/bubble.png")}}" alt="bubble">
                <img src="{{url("imgs/bubble.png")}}" alt="bubble">
                <img src="{{url("imgs/bubble.png")}}" alt="bubble">
                <img src="{{url("imgs/bubble.png")}}" alt="bubble">
                <img src="{{url("imgs/bubble.png")}}" alt="bubble">
            </div>
        </div>

        <div class="box-content2">
            <div class="container">
                <div class="distance">
                    <h2 class="text-center blog-category">News</h2>
                    <div class="row">
                        @foreach($news as $item)
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
                                        <a href="{{url("/blog/news/detail",["id"=>$item->id])}}">{{$item->title}}</a>
                                    </h3>
                                    <div class="post-meta">
                                                <span class="post-meta-item post-author">
                                                    <a href="{{url("/blog?table_search=".$item->author)}}">{{$item->author}}</a>
                                                </span>
                                        <span class="post-meta-item post-date">
                                                    <a>{{$item->created_at}}</a>
                                                </span>
                                        <span class="post-meta-item post-comments">
                                            <?php $count = 0; ?>
                                            @foreach($item->Comment as $cmt)
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
                                                <a class="more-click" href="{{url("/blog/news/detail",["id"=>$item->id])}}">
                                                    Read More
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="features">
                    <h2 class="text-center blog-category">Application Features</h2>
                    <div class="row">
                        <div class="col-md-4 features-item">
                            <div class="features-item-image">
                                <img src="{{url("imgs/006-growth (1).jpg")}}" alt="">
                            </div>

                            <div class="features-item-text">
                                <h4 class="features-item-title">
                                    <a href="">Rewards</a>
                                </h4>
                                <p class="features-item-content">The more you spend, the higher the reward points</p>
                            </div>
                        </div>
                        <div class="col-md-4 features-item">
                            <div class="features-item-image">
                                <img src="{{url("imgs/011-money-2.jpg")}}" alt="">
                            </div>

                            <div class="features-item-text">
                                <h4 class="features-item-title">
                                    <a href="">Cash Back</a>
                                </h4>
                                <p class="features-item-content">Cashback offers for loyal customers</p>
                            </div>
                        </div>
                        <div class="col-md-4 features-item ">
                            <div class="features-item-image">
                                <img src="{{url("imgs/027-business-7.jpg")}}" alt="">
                            </div>

                            <div class="features-item-text">
                                <h4 class="features-item-title">
                                    <a href="">Balance Transfer</a>
                                </h4>
                                <p class="features-item-content">Quick and easy transfer</p>
                            </div>
                        </div>
                        <div class="col-md-4 features-item">
                            <div class="features-item-image">
                                <img src="{{url("imgs/009-worldwide.jpg")}}" alt="">
                            </div>

                            <div class="features-item-text">
                                <h4 class="features-item-title">
                                    <a href="">Convenient</a>
                                </h4>
                                <p class="features-item-content">Trade anywhere, just a computer with a network</p>
                            </div>
                        </div>
                        <div class="col-md-4 features-item">
                            <div class="features-item-image">
                                <img src="{{url("imgs/010-cash.jpg")}}" alt="">
                            </div>
                            <div class="features-item-text">
                                <h4 class="features-item-title">
                                    <a href="">Savings</a>
                                </h4>
                                <p class="features-item-content">Savings with preferential packages are entitled to high interest rates</p>
                            </div>
                        </div>
                        <div class="col-md-4 features-item">
                            <div class="features-item-image">
                                <img src="{{url("imgs/007-profits.jpg")}}" alt="">
                            </div>

                            <div class="features-item-text">
                                <h4 class="features-item-title">
                                    <a href="">Low transaction fees</a>
                                </h4>
                                <p class="features-item-content">Make transactions between accounts at low cost</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="margin-bottom: 50px">
                    <h2 class="blog-category text-center">Find a Card from your Favorite <br> Financial Institution</h2>
                    <div class="swiper-container mySwiper" style="overflow: hidden">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="#"><img src="{{asset("imgs/slide-logo-1.webp")}}" alt="slide-logo"></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#"><img src="{{asset("imgs/slider-logo-2.webp")}}" alt="slide-logo"></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#"><img src="{{asset("imgs/slider-logo-3.webp")}}" alt="slide-logo"></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#"><img src="{{asset("imgs/slider-logo-4.webp")}}" alt="slide-logo"></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#"><img src="{{asset("imgs/slider-logo-5.webp")}}" alt="slide-logo"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
