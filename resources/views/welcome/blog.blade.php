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
                                            <input type="text" name="table_search" class="form-control"
                                                   value="{{$search}}"
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
                                                    @foreach($n->Comment as $cmt)
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
                                                                <tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Month"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">August 2021</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th></tr>
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
    </div>

@endsection
