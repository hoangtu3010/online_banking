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
                    <h1>Transfer</h1>
                </div>
                <div class="col-md-6">

                </div>
            </div>
        </div>
    </section>
    <section class="content content-main">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="text-center text-secondary">Sender</h4>
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-center text-secondary">Getter</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-check-transfer row">
                        <div class="section-role col-md-6">
                            <p>
                                <label>Name: </label> <span>{{Auth::user()->name}}</span>
                            </p>
                            <p>
                                <label>Account number: </label> <span>{{ $data->stk }}</span>
                            </p>
                            <p>
                                <label>Balance: </label> <span>{{ $data->balance}} VNĐ</span>
                            </p>
                            <p>
                                <label>Transfer amount: </label> <span>{{ $money }} VNĐ</span>
                            </p>
                            @if($who==0)
                            @if(Auth::user()->id==$user_getter_id)
                                <p>
                                    <label>Transfer fee: </label> <span> 0 VNĐ</span>
                                </p>
                            @else
                                @if($money*0.05>5000)
                                    <p>
                                        <label>Transfer fee: </label> <span> 5000 VNĐ</span>
                                    </p>
                                @else
                                    <p>
                                        <label>Transfer fee: </label> <span>{{ $money*0.05}} VNĐ </span>
                                    </p>
                                @endif
                            @endif
                            @endif
                            <p>
                                <label>Message:</label>
                                <span>{{ $message }}</span>
                            </p>

                        </div>
                        <div class="border-center"></div>
                        <div class="section-role col-md-6">

                            @if($getter->user)
                                <p><label>Name: </label> <span>{{$getter->user->name}}</span></p>
                            @else
                                <h5 class="text-center">Chưa liên kết account</h5>
                            @endif

                            <p><label>Account number: </label> <span>{{ $getter->stk }}</span></p>


                                @if($who==1)
                                    @if(Auth::user()->id==$user_getter_id)
                                        <p>
                                            <label>Transfer fee: </label> <span> 0 VNĐ</span>
                                        </p>
                                    @else
                                        @if($money*0.05>5000)
                                            <p>
                                                <label>Transfer fee: </label> <span> 5000 VNĐ</span>
                                            </p>
                                        @else
                                            <p>
                                                <label>Transfer fee: </label> <span>{{ $money*0.05}} VNĐ </span>
                                            </p>
                                        @endif
                                    @endif
                                @endif
                        </div>
                        <div class="button-form-transfer">
                            <a href="{{url("user/bankAccount/login")}}" class="btn" type="submit" style="float: right">Accept</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
