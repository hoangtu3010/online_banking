@extends("welcome.layout-welcome")
@section("main")
    <link rel="stylesheet" href="{{asset("css/blogDetail.css")}}">
    <div class="container">
        <aside1 class="blog-detail">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="info-detail">{{$data->title}}</h2>
                    <div class="breadcrumbs">

                        <a href="{{url("")}}">Home</a>
                        <span class="breadcrumbs_delimiter"><i class="fas fa-chevron-right"></i></span>

                        <a href="{{url("blog")}}">All Posts</a>
                        <span class="breadcrumbs_delimiter"><i class="fas fa-chevron-right"></i></span>
                        <a href="{{url("/blog/news/detail",["id"=>$data->id])}}">{{$data->title}}</a>
                    </div>
                </div>

            </div>
        </aside1>

        <div class="blog-main">
            <div class="row">
                <div class="col-md-7 blog-item">

                    <div class="post-image">
                        <img src="{{$data->getImage()}}"
                             width="700px" height="400px" alt="img">
                        <div class="mask"></div>
                    </div>
                    <div class="post-header">
                        <h3 class="post-title">
                            <a href="{{url("/blog/news/detail",["id"=>$data->id])}}">{{$data->title}}</a>
                        </h3>
                        <div class="post-meta">
                                            <span class="post-meta-item post-author">
                                                <a>{{$data->author}}</a>
                                            </span>
                            <span class="post-meta-item post-date">
                                <a> {{$data->created_at}}</a>
                            </span>
                        </div>
                        <div class="post-content">
                            <div class="post-content-inne">
                                <p class="text-content">
                                    {{$data->content}}
                                </p>

                            </div>
                        </div>
                    </div>
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

{{--                <div class="col-md-7 blog-item">--}}
{{--                    <div class="post-image">--}}
{{--                        <img src="http://creditcard.axiomthemes.com/wp-content/uploads/2017/06/post-5-1170x658.jpg"--}}
{{--                             width="700px" height="400px" alt="img">--}}
{{--                        <div class="mask"></div>--}}
{{--                    </div>--}}
{{--                    <div class="post-header">--}}
{{--                        <h3 class="post-title">--}}
{{--                            <a href="">Credit not as great as you would like?</a>--}}
{{--                        </h3>--}}
{{--                        <div class="post-meta">--}}
{{--                                            <span class="post-meta-item post-author">--}}
{{--                                                <a>Funding Trends</a>--}}
{{--                                            </span>--}}
{{--                            <span class="post-meta-item post-date">--}}
{{--                                                <a> June 26, 2017</a>--}}
{{--                                            </span>--}}

{{--                        </div>--}}
{{--                        <div class="post-content">--}}
{{--                            <div class="post-content-inne">--}}
{{--                                <p class="text-content">--}}
{{--                                    Nullam tincidunt elit dolor, quis venenatis magna convallis at.--}}
{{--                                    Nam fringilla mauris ut leo imperdiet, ut pulvinar sem eleifend. Sed iaculis--}}
{{--                                    pharetra interdum.--}}
{{--                                    In pellentesque tempus magna, et volutpat eros aliquet non. Duis condimentum ligula--}}
{{--                                    nec justo viverra ultricies.--}}
{{--                                    Integer non ipsum ac orci pharetra hendrerit et ut nisl. Suspendisse eu volutpat--}}
{{--                                    arcu. Etiam consectetur varius nulla, eget imperdiet dui…--}}
{{--                                </p>--}}
{{--                                <p style="margin-top: 25px">--}}
{{--                                    <a class="more-click" href="#">--}}
{{--                                        Read More--}}
{{--                                    </a>--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-5 box-right">--}}
{{--                    <div class="box-content-calender">--}}
{{--                        <div class="box-calender">--}}
{{--                            <h5 class="text-box">--}}
{{--                                Calender--}}
{{--                            </h5>--}}
{{--                            <aside class="widget widget_calendar">--}}

{{--                            </aside>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
        <hr>

        <section class="comments_list_title">
            <div class="comments_list_wrap">
                <h3 class="section_title comments_list_title">2 Comments</h3>
                <ul class="comments_list">
                    <li class="comment even thread-even depth-1 comment_item">
                        <div class="post-comments">
                            <div class="author-img">
                                <img src="http://2.gravatar.com/avatar/ba7c516645337a87711c98fe6e548402?s=200&d=mm&r=g"
                                     width="180px" height="180px" alt="">
                            </div>
                            <div class="comment_content">
                                <div class="comment_info">
                                    <h6 class="comment_author">Martin Moore
                                        <span class="comment_date">June 27, 2017</span>
                                    </h6>

                                    <div class="comment_text_wrap">
                                        <div class="comment_text">
                                            <p>
                                                Never have I ever thought that using this type of services is going to
                                                bring me additional rewards,
                                                points and joy! Thanks for the great experience
                                            </p>

                                        </div>
                                        <a href="#" class="reply comment_reply">Reply</a>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </li>
                    <li class="comment even thread-even depth-1 comment_item">
                        <div class="post-comments">
                            <div class="author-img">
                                <img src="http://2.gravatar.com/avatar/ba7c516645337a87711c98fe6e548402?s=200&d=mm&r=g"
                                     width="180px" height="180px" alt="">
                            </div>
                            <div class="comment_content">
                                <div class="comment_info">
                                    <h6 class="comment_author">Martin Moore
                                        <span class="comment_date">June 27, 2017</span>
                                    </h6>

                                    <div class="comment_text_wrap">
                                        <div class="comment_text">
                                            <p>
                                                Never have I ever thought that using this type of services is going to
                                                bring me additional rewards,
                                                points and joy! Thanks for the great experience
                                            </p>

                                        </div>
                                        <a href="#" class="reply comment_reply">Reply</a>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </li>
                </ul>

            </div>
        </section>

        <div class="message-content">
            <h3 class="messsage-info">
                Leave a comment
            </h3>
            <div class="row">
                <div class="col-md-6">
                    <form class="form-message">
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                   placeholder="Enter email">
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <form class="form-message">
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                   placeholder="Enter email">
                        </div>
                    </form>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <p class="wpgdprc-checkbox">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                By using this form you agree with the storage and handling of your data by this website
                            </label>
                        </div>
                        </p>
                    </div>
                </div>

                <button class="btn btn-primary tag-button">Send message</button>

            </div>


        </div>


    </div>
@endsection
