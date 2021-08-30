@extends("welcome.layout-welcome")
@section("main")
    <link rel="stylesheet" href="{{asset("css/blog.css")}}">

    <div class="container">
        <div class="blog-main">
            <div class="row ">
                <div class="col-md-12">
                    <div class=" blog-header">
                        <div class="row">
                            <div class="col-md-7">
                                <h1 class="blog-header-title">
                                    All Posts
                                </h1>
                                <div class="direction">
                            <span>
                                <a href="{{url("/")}}">Home</a>
                            </span>
                                    <span>
                                <i class="ion-chevron-right"></i>
                            </span>
                                    <span>
                                <a>All Posts</a>
                            </span>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card-tools">
                                    <form action="{{url("/blog")}}" method="get">
                                        <div class="input-group input-search">
                                            <input type="text" name="table_search" class="form-control" value="{{$search}}"
                                                   placeholder="Search by title or author...">
                                            <button
                                                type="submit" class="btn">
                                                <i class="ion-ios-search-strong"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    @foreach( $news as $n)
                        <div class="blog-item">
                            <div class="post-image">
                                <img src="{{$n->getImage()}}" alt="img" width="100%" height="450px">
                                <div class="mask"></div>
                                <a class="post-icons">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                            <div class="post-header">
                                <h2 class="post-title">
                                    <a href="{{url("/blog/news/detail",["id"=>$n->id])}}">{{$n->__get("title")}}</a>
                                </h2>
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
                                                    {{$count}} Comments</a>
                                            </span>
                                </div>
                                <div class="post-content">
                                    <div class="post-content-inner">
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
                        </div>
                        <hr>
                    @endforeach
                        {!! $news->links("vendor.pagination.default") !!}
                </div>

                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="sidebar-inner">
                            <h4 class="sidebar-inner-title">
                                Recent Posts
                            </h4>
                            @foreach($recent as $r)

                                <div class="sidebar-post-item">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <a href="{{url("/blog/news/detail",["id"=>$r->id])}}"><img
                                                    src="{{$r->getImage()}}"></a>
                                        </div>
                                        <div class="col-md-7 d-flex flex-column">
                                            <a href="{{url("/blog/news/detail",["id"=>$r->id])}}"
                                               class="sidebar-post-title">{{$r->title}}</a>
                                            <span
                                                class="sidebar-post-date">{{date_format($r->created_at,"Y-m-d")}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="sidebar-inner">
                            <div class="">
                                <h4 class="sidebar-inner-title">
                                    Calender
                                </h4>
                                <aside class="widget widget_calendar">

                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
