@extends("layout")
@section("main")
    <link rel="stylesheet" href="{{asset("css/form-style.css")}}">

    <div class="bgr-head-list"></div>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 content-header-left">
                    <a href="{{url("user/bankAccount")}}">
                        <i class="button-back ion-ios-arrow-thin-left"></i>
                    </a>
                    <h1>History</h1>
                </div>
                <div class="col-md-6">

                </div>
            </div>

            <div class="row" style="margin-top: 40px">
                <div class="col text-center">
                    <button class="btn btn-warning text-white" type="button" data-toggle="collapse" data-target="#sent"
                            aria-expanded="false" aria-controls="sent">Sent
                    </button>
                </div>
                <div class="col text-center">
                    <button class="btn btn-secondary" type="button" data-toggle="collapse"
                            data-target=".multi-collapse" aria-expanded="false" aria-controls="sent received"><i class="ion-ios-loop-strong"></i>
                    </button>
                </div>
                <div class="col text-center">
                    <button class="btn btn-warning text-white" type="button" data-toggle="collapse" data-target="#received"
                            aria-expanded="false" aria-controls="received">Received
                    </button>
                </div>
            </div>
        </div>
    </section>
    <section class="content content-main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="collapse multi-collapse" id="sent">
                        <h5 class="text-center pt-4 text-secondary">History Sent</h5>

                        <div class="card-body table-responsive table-style">
                            <table class="table table-hover table-form text-center">
                                <thead>
                                <tr>
                                    <th>Account number</th>
                                    <th>Getter</th>
                                    <th>Amount of money</th>
                                    <th>Transfer fee</th>
                                    <th>Fee bearer</th>
                                    <th>Content</th>
                                    <th>Time</th>
                                </tr>
                                </thead>
                                <tbody>

                                @php($id_getter = null)
                                @foreach($sender as $s)
                                    <tr>
                                        <td>{{$s->getter}}</td>
                                        @foreach($all_acc as $acc)
                                            @if($s->getter == $acc->stk )
                                                @if($acc->User )
                                                    @php($id_getter = $acc->User->id)
                                                    <td>{{$acc->User->name}}</td>
                                                @else
                                                    <td>Chưa liên kết người dùng</td>
                                                @endif
                                            @endif
                                        @endforeach
                                        <td>{{$s->money}} VNĐ</td>
                                        <td>{{$s->fee}} VNĐ</td>
                                        @foreach($all_acc as $acc)
                                            @if($s->who == $acc->stk )
                                                @if($acc->User )
                                                    <td>{{$acc->User->name}}</td>
                                                @else
                                                    <td>{{$s->who}}</td>
                                                @endif
                                            @endif
                                        @endforeach
                                        <td>{{$s->content}}</td>
                                        <td>{{$s->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="collapse multi-collapse" id="received">
                        <h5 class="text-center pt-4 text-secondary">History Received</h5>

                        <div class="card-body table-responsive table-style">
                            <table class="table table-hover table-form text-center">
                                <thead>
                                <tr>
                                    <th>Account number</th>
                                    <th>Sender</th>
                                    <th>Amount of money</th>
                                    <th>Transfer fee</th>
                                    <th>Fee bearer</th>
                                    <th>Content</th>
                                    <th>Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($getter as $s)
                                    <tr>
                                        <td>{{$s->sender}}</td>
                                        @foreach($all_acc as $acc)
                                            @if($s->sender == $acc->stk )
                                                @if($acc->User )
                                                    <td>{{$acc->User->name}}</td>
                                                @else
                                                    <td>Chưa liên kết người dùng</td>
                                                @endif
                                            @endif
                                        @endforeach
                                        <td>{{$s->money}} VNĐ</td>
                                        <td>{{$s->fee}} VNĐ</td>
                                        @foreach($all_acc as $acc)
                                            @if($s->who == $acc->stk )
                                                @if($acc->User )
                                                    <td>{{$acc->User->name}}</td>
                                                @else
                                                    <td>{{$s->who}}</td>
                                                @endif
                                            @endif
                                        @endforeach

                                        <td>{{$s->content}}</td>
                                        <td>{{$s->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <table class="table">

            </table>
        </div>
    </div>

    {{--        <div class="accordion-item">--}}
    {{--            <h2 class="accordion-header" id="flush-headingTwo">--}}
    {{--                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"--}}
    {{--                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">--}}
    {{--                    <h3>Đã nhận</h3>--}}
    {{--                </button>--}}
    {{--            </h2>--}}
    {{--            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"--}}
    {{--                 data-bs-parent="#accordionFlushExample">--}}
    {{--                <div class="accordion-body">--}}
    {{--                    <table class="table">--}}

    {{--                    </table>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

@endsection
