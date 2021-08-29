@extends("welcome.layout-welcome")
@section("main")
    <link rel="stylesheet" href="{{asset("css/blogDetail.css")}}">

    <div class="container">
        <div class="blog-main">
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-header">
                        <div class="direction">
                            <h1 class="blog-header-title">
                                {{$data->title}}
                            </h1>
                            <span>
                                <a href="{{url("/")}}">Home</a>
                            </span>
                            <span>
                                <i class="ion-chevron-right"></i>
                            </span>
                            <span>
                                <a href="{{url("blog")}}">All Posts</a>
                            </span>
                            <span>
                                <i class="ion-chevron-right"></i>
                            </span>
                            <span>
                                <a href="{{url("/blog/news/detail",["id"=>$data->id])}}">{{$data->title}}</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 ">
                    <div class="blog-item">
                        <div class="post-image">
                            <img src="{{$data->getImage()}}" width="100%" alt="img">
                        </div>
                        <div class="post-header">
                            <div class="post-meta">
                                <span class="post-meta-item post-author">
                                    <a>{{$data->author}}</a>
                                </span>
                                <span class="post-meta-item post-date">
                                     <a> {{$data->created_at}}</a>
                                </span>
                                <span class="post-meta-item post-comments">
                                    <a> <?php $count = 0; ?>
                                        @foreach($data->comment as $cmt)
                                            <?php $count++; ?>
                                        @endforeach
                                        {{$count}} Comments</a>
                                </span>
                            </div>
                            <div class="post-content">
                                <div class="post-content-inner">
                                    <p class="text-content">
                                        {{$data->content}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-social-posts">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="ion-social-twitter"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="ion-social-facebook"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="ion-social-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
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
        <hr>
        <div class="posts-comments">
            <div class="posts-comments-header">
                <h3>
                    <?php $count = 0; ?>
                    @foreach($data->comment as $cmt)
                        <?php $count++; ?>
                    @endforeach
                    {{$count}} Comments
                </h3>
            </div>
            <div class="posts-comments-main">
                <details open class="comment" id="comment-1">
                    <summary>
                        <div class="comment-info">
                            <a href="#" class="comment-author">
                                Hoang Anh Tu
                            </a>
                            <p>
                                22 points &bull; 4 days ago
                            </p>
                        </div>
                        <div class="comment-body">
                            <p>
                                This is really great! I fully agree with what you wrote, and this is sure to help me out
                                in the future. Thank you for posting this.
                            </p>
                            <button class="btn btn-reply-comment p-0" type="button" data-toggle="reply-form"
                                    data-target="comment-1-reply-form">Reply
                            </button>
                            <form action="#" method="POST" class="row reply-form d-none form-input-comment needs-validation" id="comment-1-reply-form" novalidate>
                                @csrf
                                <div class="form-group col-md-6">
                                    <input type="text" name="name" class="form-control input-comment" placeholder="Name" required>
                                    <div class="invalid-feedback">
                                        Please enter name.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" name="email" class="form-control input-comment" placeholder="Email" required>
                                    <div class="invalid-feedback">
                                        Please enter email.
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea name="content" class="form-control input-comment" placeholder="Reply to comment" rows="4" required></textarea>
                                    <div class="invalid-feedback">
                                        Please enter comment.
                                    </div>
                                </div>
                                <div class="col-md-12 actions-comment">
                                    <button class="btn btn-secondary" type="button" data-toggle="reply-form"
                                            data-target="comment-1-reply-form">Cancel
                                    </button>
                                    <button class="btn btn-outline-info" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                        <hr>
                        <div class="replies">
                            <details open class="comment" id="comment-2">
                                <summary>
                                    <div class="comment-info">
                                        <a href="" class="comment-author">
                                            Hoang Anh Tu
                                        </a>
                                        <p class="m-0">
                                            22 points &bull; 4 days ago
                                        </p>
                                    </div>
                                    <p>
                                        This is really great! I fully agree with what you wrote, and this is sure to
                                        help me out in the future. Thank you for posting this.
                                    </p>
                                    <button class="btn btn-reply-comment p-0" type="button" data-toggle="reply-form"
                                            data-target="comment-2-reply-form">Reply
                                    </button>
                                    <form action="#" method="POST" class="row reply-form d-none form-input-comment needs-validation"
                                          id="comment-2-reply-form" novalidate>
                                        @csrf
                                        <div class="form-group col-md-6">
                                            <input type="text" name="name" class="form-control input-comment" placeholder="Name" required>
                                            <div class="invalid-feedback">
                                                Please enter name.
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="email" name="email" class="form-control input-comment" placeholder="Email" required>
                                            <div class="invalid-feedback">
                                                Please enter email.
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <textarea name="content" class="form-control input-comment" placeholder="Reply to comment" rows="4" required></textarea>
                                            <div class="invalid-feedback">
                                                Please enter comment.
                                            </div>
                                        </div>
                                        <div class="col-md-12 actions-comment">
                                            <button class="btn btn-secondary" type="button" data-toggle="reply-form"
                                                    data-target="comment-2-reply-form">Cancel
                                            </button>

                                            <button class="btn btn-outline-info" type="submit">Submit</button>
                                        </div>

                                    </form>
                                </summary>
                            </details>
                        </div>
                    </summary>
                </details>
            </div>
            <hr>
            <div class="posts-comments-footer">
                <div class="form-comment-footer">
                    <div class="posts-comments-header">
                        <h3 >Leave a comment</h3>

                    </div>
                    <form action="#" method="POST" class="row form-input-comment needs-validation" novalidate>
                        @csrf
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control input-comment" placeholder="Name" required>
                            <div class="invalid-feedback">
                                Please enter name.
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control input-comment" placeholder="Email" required>
                            <div class="invalid-feedback">
                                Please enter email.
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="content" class="form-control input-comment" placeholder="Reply to comment" rows="4" required></textarea>
                            <div class="invalid-feedback">
                                Please enter comment.
                            </div>
                        </div>
                        <div class="col-md-12 actions-comment">
                            <button class="btn btn-outline-info" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener(
        "click", function (event) {
            var target = event.target;
            var replyForm;
            if (target.matches("[data-toggle='reply-form']")) {
                replyForm = document.getElementById(target.getAttribute("data-target"));
                replyForm.classList.toggle("d-none")
            }
        },
        false
    );
</script>
