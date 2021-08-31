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
                                    <a href="{{url("/blog?table_search=".$data->author)}}">{{$data->author}}</a>
                                </span>
                                <span class="post-meta-item post-date">
                                     <a> {{$data->created_at}}</a>
                                </span>
                                <span class="post-meta-item post-comments">
                                    <a> <?php $count = 0; ?>
                                        @foreach($data->Comment as $cmt)
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
                    <hr>

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


                        <aside class="widget widget_calendar">
                            <div class="card" style="background-color: #f7f8f8; color: #212558; ">
                                <div class="card-header border-0 ui-sortable-handle"
                                     style="cursor: move; padding: 30px">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3 class="card-title" style="font-weight: 700">
                                                <i class="far fa-calendar-alt"></i>
                                                Calendar
                                            </h3>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- button with a dropdown -->
                                            <button style="float: right" type="button" class="btn btn-sm"
                                                    data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body pt-0">
                                    <!--The calendar -->
                                    <div id="calendar" style="width: 100%">
                                        <div class="bootstrap-datetimepicker-widget usetwentyfour">
                                            <ul class="list-unstyled">
                                                <li class="show">
                                                    <div class="datepicker">
                                                        <div class="datepicker-days" style="">
                                                            <table class="table table-sm table-borderless">
                                                                <thead>
                                                                <tr>
                                                                    <th class="dow">Su</th>
                                                                    <th class="dow">Mo</th>
                                                                    <th class="dow">Tu</th>
                                                                    <th class="dow">We</th>
                                                                    <th class="dow">Th</th>
                                                                    <th class="dow">Fr</th>
                                                                    <th class="dow">Sa</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td data-action="selectDay" data-day="08/01/2021"
                                                                        class="day weekend">1
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/02/2021"
                                                                        class="day">2
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/03/2021"
                                                                        class="day">3
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/04/2021"
                                                                        class="day">4
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/05/2021"
                                                                        class="day">5
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/06/2021"
                                                                        class="day">6
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/07/2021"
                                                                        class="day weekend">7
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-action="selectDay" data-day="08/08/2021"
                                                                        class="day weekend">8
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/09/2021"
                                                                        class="day">9
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/10/2021"
                                                                        class="day">10
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/11/2021"
                                                                        class="day">11
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/12/2021"
                                                                        class="day">12
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/13/2021"
                                                                        class="day">13
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/14/2021"
                                                                        class="day weekend">14
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-action="selectDay" data-day="08/15/2021"
                                                                        class="day weekend">15
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/16/2021"
                                                                        class="day">16
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/17/2021"
                                                                        class="day">17
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/18/2021"
                                                                        class="day">18
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/19/2021"
                                                                        class="day">19
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/20/2021"
                                                                        class="day">20
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/21/2021"
                                                                        class="day weekend">21
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-action="selectDay" data-day="08/22/2021"
                                                                        class="day weekend">22
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/23/2021"
                                                                        class="day">23
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/24/2021"
                                                                        class="day">24
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/25/2021"
                                                                        class="day">25
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/26/2021"
                                                                        class="day">26
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/27/2021"
                                                                        class="day">27
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/28/2021"
                                                                        class="day weekend">28
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-action="selectDay" data-day="08/29/2021"
                                                                        class="day weekend">29
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/30/2021"
                                                                        class="day">30
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="08/31/2021"
                                                                        class="day active today">31
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="09/01/2021"
                                                                        class="day new">1
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="09/02/2021"
                                                                        class="day new">2
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="09/03/2021"
                                                                        class="day new">3
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="09/04/2021"
                                                                        class="day new weekend">4
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-action="selectDay" data-day="09/05/2021"
                                                                        class="day new weekend">5
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="09/06/2021"
                                                                        class="day new">6
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="09/07/2021"
                                                                        class="day new">7
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="09/08/2021"
                                                                        class="day new">8
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="09/09/2021"
                                                                        class="day new">9
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="09/10/2021"
                                                                        class="day new">10
                                                                    </td>
                                                                    <td data-action="selectDay" data-day="09/11/2021"
                                                                        class="day new weekend">11
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="datepicker-months" style="display: none;">
                                                            <table class="table-condensed">
                                                                <thead>
                                                                <tr>
                                                                    <th class="prev" data-action="previous"><span
                                                                            class="fa fa-chevron-left"
                                                                            title="Previous Year"></span></th>
                                                                    <th class="picker-switch" data-action="pickerSwitch"
                                                                        colspan="5" title="Select Year">2021
                                                                    </th>
                                                                    <th class="next" data-action="next"><span
                                                                            class="fa fa-chevron-right"
                                                                            title="Next Year"></span></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td colspan="7"><span data-action="selectMonth"
                                                                                          class="month">Jan</span><span
                                                                            data-action="selectMonth"
                                                                            class="month">Feb</span><span
                                                                            data-action="selectMonth"
                                                                            class="month">Mar</span><span
                                                                            data-action="selectMonth"
                                                                            class="month">Apr</span><span
                                                                            data-action="selectMonth"
                                                                            class="month">May</span><span
                                                                            data-action="selectMonth"
                                                                            class="month">Jun</span><span
                                                                            data-action="selectMonth"
                                                                            class="month">Jul</span><span
                                                                            data-action="selectMonth"
                                                                            class="month active">Aug</span><span
                                                                            data-action="selectMonth"
                                                                            class="month">Sep</span><span
                                                                            data-action="selectMonth"
                                                                            class="month">Oct</span><span
                                                                            data-action="selectMonth"
                                                                            class="month">Nov</span><span
                                                                            data-action="selectMonth"
                                                                            class="month">Dec</span></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="datepicker-years" style="display: none;">
                                                            <table class="table-condensed">
                                                                <thead>
                                                                <tr>
                                                                    <th class="prev" data-action="previous"><span
                                                                            class="fa fa-chevron-left"
                                                                            title="Previous Decade"></span></th>
                                                                    <th class="picker-switch" data-action="pickerSwitch"
                                                                        colspan="5" title="Select Decade">2020-2029
                                                                    </th>
                                                                    <th class="next" data-action="next"><span
                                                                            class="fa fa-chevron-right"
                                                                            title="Next Decade"></span></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td colspan="7"><span data-action="selectYear"
                                                                                          class="year old">2019</span><span
                                                                            data-action="selectYear"
                                                                            class="year">2020</span><span
                                                                            data-action="selectYear"
                                                                            class="year active">2021</span><span
                                                                            data-action="selectYear"
                                                                            class="year">2022</span><span
                                                                            data-action="selectYear"
                                                                            class="year">2023</span><span
                                                                            data-action="selectYear"
                                                                            class="year">2024</span><span
                                                                            data-action="selectYear"
                                                                            class="year">2025</span><span
                                                                            data-action="selectYear"
                                                                            class="year">2026</span><span
                                                                            data-action="selectYear"
                                                                            class="year">2027</span><span
                                                                            data-action="selectYear"
                                                                            class="year">2028</span><span
                                                                            data-action="selectYear"
                                                                            class="year">2029</span><span
                                                                            data-action="selectYear" class="year old">2030</span>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="datepicker-decades" style="display: none;">
                                                            <table class="table-condensed">
                                                                <thead>
                                                                <tr>
                                                                    <th class="prev" data-action="previous"><span
                                                                            class="fa fa-chevron-left"
                                                                            title="Previous Century"></span></th>
                                                                    <th class="picker-switch" data-action="pickerSwitch"
                                                                        colspan="5">2000-2090
                                                                    </th>
                                                                    <th class="next" data-action="next"><span
                                                                            class="fa fa-chevron-right"
                                                                            title="Next Century"></span></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td colspan="7"><span data-action="selectDecade"
                                                                                          class="decade old"
                                                                                          data-selection="2006">1990</span><span
                                                                            data-action="selectDecade" class="decade"
                                                                            data-selection="2006">2000</span><span
                                                                            data-action="selectDecade"
                                                                            class="decade active" data-selection="2016">2010</span><span
                                                                            data-action="selectDecade"
                                                                            class="decade active" data-selection="2026">2020</span><span
                                                                            data-action="selectDecade" class="decade"
                                                                            data-selection="2036">2030</span><span
                                                                            data-action="selectDecade" class="decade"
                                                                            data-selection="2046">2040</span><span
                                                                            data-action="selectDecade" class="decade"
                                                                            data-selection="2056">2050</span><span
                                                                            data-action="selectDecade" class="decade"
                                                                            data-selection="2066">2060</span><span
                                                                            data-action="selectDecade" class="decade"
                                                                            data-selection="2076">2070</span><span
                                                                            data-action="selectDecade" class="decade"
                                                                            data-selection="2086">2080</span><span
                                                                            data-action="selectDecade" class="decade"
                                                                            data-selection="2096">2090</span><span
                                                                            data-action="selectDecade"
                                                                            class="decade old" data-selection="2106">2100</span>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="picker-switch accordion-toggle"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>

        <div class="posts-comments">
            <div class="posts-comments-header">
                <h3>
                    <?php $count = 0; ?>
                    @foreach($data->Comment as $cmt)
                        <?php $count++; ?>
                    @endforeach
                    {{$count}} Comments
                </h3>
            </div>
            <div class="posts-comments-main">
                @foreach($data->Comment as $cmt)
                    @if(!$cmt->reply_id)
                        <details open class="comment" id="comment-{{$cmt->id}}">
                            <summary>
                                <div class="comment-info">
                                    <a href="#" class="comment-author">
                                        {{$cmt->customer_name}}
                                    </a>
                                    <p>
                                        {{$cmt->created_at->format('d-m-Y')}}
                                    </p>
                                </div>
                                <div class="comment-body">
                                    <p>
                                        {{$cmt->content}}
                                    </p>
                                    <button class="btn btn-reply-comment p-0" type="button" data-toggle="reply-form"
                                            data-target="comment-{{$cmt->id}}-reply-form">Reply
                                    </button>
                                    <form action="{{url("blog/news/detail/reply",["id"=>$data->id,"rep"=>$cmt->id])}}"
                                          method="POST"
                                          class="row reply-form d-none form-input-comment needs-validation"
                                          id="comment-{{$cmt->id}}-reply-form" novalidate>
                                        @csrf
                                        <div class="form-group col-md-6">
                                            <input type="text" name="name" class="form-control input-comment"
                                                   placeholder="Name" required>
                                            <div class="invalid-feedback">
                                                Please enter name.
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="email" name="email" class="form-control input-comment"
                                                   placeholder="Email" required>
                                            <div class="invalid-feedback">
                                                Please enter email.
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <textarea name="content" class="form-control input-comment"
                                                      placeholder="Reply to comment" rows="4" required></textarea>
                                            <div class="invalid-feedback">
                                                Please enter comment.
                                            </div>
                                        </div>
                                        <div class="col-md-12 actions-comment">
                                            <button class="btn btn-secondary" type="button" data-toggle="reply-form"
                                                    data-target="comment-{{$cmt->id}}-reply-form">Cancel
                                            </button>
                                            <button class="btn btn-outline-info" type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <hr>
                                <div class="replies">
                                    @foreach($data->Comment as $reply)
                                        @if($reply->reply_id== $cmt->id)
                                            <details open class="comment" id="comment-{{$reply->id}}">
                                                <summary>
                                                    <div class="comment-info">
                                                        <a href="" class="comment-author">
                                                            {{$reply->customer_name}}
                                                        </a>
                                                        <p class="m-0">
                                                            {{$reply->created_at->format('d-m-Y')}}
                                                        </p>
                                                    </div>
                                                    <p>
                                                        {{$reply->content}}
                                                    </p>
                                                    <button class="btn btn-reply-comment p-0" type="button"
                                                            data-toggle="reply-form"
                                                            data-target="comment-{{$reply->id}}-reply-form">Reply
                                                    </button>
                                                    <form
                                                        action="{{url("blog/news/detail/reply",["id"=>$data->id,"rep"=>$reply->id])}}"
                                                        method="POST"
                                                        class="row reply-form d-none form-input-comment needs-validation"
                                                        id="comment-{{$reply->id}}-reply-form" novalidate>
                                                        @csrf
                                                        <div class="form-group col-md-6">
                                                            <input type="text" name="name"
                                                                   class="form-control input-comment" placeholder="Name"
                                                                   required>
                                                            <div class="invalid-feedback">
                                                                Please enter name.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <input type="email" name="email"
                                                                   class="form-control input-comment"
                                                                   placeholder="Email" required>
                                                            <div class="invalid-feedback">
                                                                Please enter email.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <textarea name="content" class="form-control input-comment"
                                                                      placeholder="Reply to comment" rows="4"
                                                                      required></textarea>
                                                            <div class="invalid-feedback">
                                                                Please enter comment.
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 actions-comment">
                                                            <button class="btn btn-secondary" type="button"
                                                                    data-toggle="reply-form"
                                                                    data-target="comment-{{$reply->id}}-reply-form">
                                                                Cancel
                                                            </button>

                                                            <button class="btn btn-outline-info" type="submit">Submit
                                                            </button>
                                                        </div>
                                                    </form>
                                                </summary>
                                            </details>
                                            <hr>
                                            <div class="replies">
                                                @foreach($data->Comment as $reply2)
                                                    @if($reply2->reply_id== $reply->id)
                                                        <details open class="comment" id="comment-{{$reply2->id}}">
                                                            <summary>
                                                                <div class="comment-info">
                                                                    <a href="" class="comment-author">
                                                                        {{$reply2->customer_name}}
                                                                    </a>
                                                                    <p class="m-0">
                                                                        {{$reply2->created_at->format('d-m-Y')}}
                                                                    </p>
                                                                </div>
                                                                <p>
                                                                    {{$reply2->content}}
                                                                </p>
                                                                <button class="btn btn-reply-comment p-0" type="button"
                                                                        data-toggle="reply-form"
                                                                        data-target="comment-{{$reply2->id}}-reply-form">
                                                                    Reply
                                                                </button>
                                                                <form
                                                                    action="{{url("blog/news/detail/reply",["id"=>$data->id,"rep"=>$reply2->id])}}"
                                                                    method="POST"
                                                                    class="row reply-form d-none form-input-comment needs-validation"
                                                                    id="comment-{{$reply2->id}}-reply-form" novalidate>
                                                                    @csrf
                                                                    <div class="form-group col-md-6">
                                                                        <input type="text" name="name"
                                                                               class="form-control input-comment"
                                                                               placeholder="Name" required>
                                                                        <div class="invalid-feedback">
                                                                            Please enter name.
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <input type="email" name="email"
                                                                               class="form-control input-comment"
                                                                               placeholder="Email" required>
                                                                        <div class="invalid-feedback">
                                                                            Please enter email.
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <textarea name="content"
                                                                                  class="form-control input-comment"
                                                                                  placeholder="Reply to comment"
                                                                                  rows="4" required></textarea>
                                                                        <div class="invalid-feedback">
                                                                            Please enter comment.
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 actions-comment">
                                                                        <button class="btn btn-secondary" type="button"
                                                                                data-toggle="reply-form"
                                                                                data-target="comment-{{$reply2->id}}-reply-form">
                                                                            Cancel
                                                                        </button>

                                                                        <button class="btn btn-outline-info"
                                                                                type="submit">Submit
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </summary>
                                                        </details>
                                                        <hr>
                                                        <div class="replies">
                                                            @foreach($data->Comment as $reply3)
                                                                @if($reply3->reply_id== $reply2->id)
                                                                    <details open class="comment"
                                                                             id="comment-{{$reply3->id}}">
                                                                        <summary>
                                                                            <div class="comment-info">
                                                                                <a href="" class="comment-author">
                                                                                    {{$reply3->customer_name}}
                                                                                </a>
                                                                                <p class="m-0">
                                                                                    {{$reply3->created_at->format('d-m-Y')}}
                                                                                </p>
                                                                            </div>
                                                                            <p>
                                                                                {{$reply3->content}}
                                                                            </p>
                                                                        </summary>
                                                                    </details>
                                                                    <hr>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </summary>
                        </details>
                    @endif
                @endforeach
            </div>
            <div class="posts-comments-footer">
                <div class="form-comment-footer">
                    <div class="posts-comments-header">
                        <h3>Leave a comment</h3>

                    </div>
                    <form action="{{url("blog/news/detail/cmt",["id"=>$data->id])}}" method="POST"
                          class="row form-input-comment needs-validation" novalidate>
                        @csrf
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control input-comment" placeholder="Name"
                                   required>
                            <div class="invalid-feedback">
                                Please enter name.
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control input-comment" placeholder="Email"
                                   required>
                            <div class="invalid-feedback">
                                Please enter email.
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="content" class="form-control input-comment" placeholder="Reply to comment"
                                      rows="4" required></textarea>
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
