@extends("welcome.layout-welcome")
@section("main")
    <link rel="stylesheet" href="{{asset("css/blog.css")}}">

    <div class="container">
        <div class="blog-main">
            <div class="row ">
                <div class="col-md-7 blog-item">
                    <div class="post-header">
                        <h1 class="post-title">
                            <a href="{{url("blog")}}">All Posts</a>
                        </h1>
                        <div class="post-meta">
                            <span class="post-meta-item post-author">
                                <a href="{{url("")}}">Home</a>
                            </span>
                            <span class="post-meta-item">
                                <a href="{{url("blog")}}">All Posts</a>
                            </span>
                        </div>
                    </div>
                    @foreach( $news as $n)
                        <div class="post-image">
                            <img src="{{$n->getImage()}}"
                                 width="700px" height="400px" alt="img">
                            <div class="mask"></div>
                        </div>
                        <div class="post-header">
                            <h3 class="post-title">
                                <a href="">{{$n->__get("title")}}</a>
                            </h3>
                            <div class="post-meta">
                                            <span class="post-meta-item post-author">
                                                <a>{{$n->author}}</a>
                                            </span>
                                <span class="post-meta-item post-date">
                                                <a> {{$n->created_at}}</a>
                                            </span>
                                <span class="post-meta-item post-comments">

                                                <a> <?php $count = 0; ?>
                                                    @foreach($n->comment as $cmt)
                                                            <?php $count++; ?>
                                                    @endforeach
                                                    {{$count}}</a>
                                            </span>
                            </div>
                            <div class="post-content">
                                <div class="post-content-inne">
                                    <p class="text-content" style="
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    -webkit-line-clamp: 4;
                                    display: -webkit-box;
                                    -webkit-box-orient: vertical;">
                                        {{$n->content}}
                                    </p>
                                    <p style="margin-top: 25px">
                                        <a class="more-click" href="{{url("/blog/news/detail",["id"=>$n->id])}}">
                                            Read More
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="col-md-5 box-right">
                    <div class="box-content">
                        <div class="box">
                            <h4 class="text-box">
                                Recent Posts
                            </h4>
                            @foreach($recent as $r)
                                <div class="box-text1">
                                    <img
                                        src="{{$r->getImage()}}"  width="120px" height="88px">
                                    <p class="box-blog">{{$r->title}}
                                        <br>
                                        <span class="box-span">{{date_format($r->created_at,"Y-m-d")}}</span>
                                    </p>
                                </div>
                            @endforeach
{{--                            <div class="box-text1">--}}
{{--                                <img--}}
{{--                                    src="http://creditcard.axiomthemes.com/wp-content/uploads/2017/06/post-5-120x88.jpg">--}}
{{--                                <p class="box-blog">Credit not as great as you would like?--}}
{{--                                    <br>--}}
{{--                                    <span class="box-span">June 26, 2017</span>--}}
{{--                                </p>--}}
{{--                            </div>--}}
                        </div>
                    </div>

                    <div class="box-content-calender">
                        <div class="box-calender">
                            <h5 class="text-box">
                                Calender
                            </h5>
                            <aside class="widget widget_calendar">

                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
