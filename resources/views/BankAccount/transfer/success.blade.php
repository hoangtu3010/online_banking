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
                    <h1>Bill</h1>
                </div>
                <div class="col-md-6">

                </div>
            </div>
        </div>
    </section>
    <section class="content content-main">
        <div class="container-fluid" style="display: flex; justify-content: center">
            <div class="card" style="width: 50%">
                <div class="card-header">
                    <h3 class="text-center">Money transfer successful</h3>
                </div>
                <div class="card-body form-confirm">
                    <div class="form-confirm-content">
                        <h4 class="text-center">Getter</h4>

                        @if($getter->User)
                            <p><label>Name: </label> {{$getter->User->name}}</p>
                        @else
                            <h5 class="text-center">Chưa liên kết account</h5>
                        @endif

                        <p><label>Account number: </label> {{ $getter->stk }}</p>


                        @if($who==1)
                            @if(Auth::user()->id==$user_getter_id)
                                <p>
                                    <label>Transfer fee: </label>  0 VNĐ
                                </p>
                            @else
                                @if($money*0.05>5000)
                                    <p>
                                        <label>Transfer fee: </label>  5000 VNĐ
                                    </p>
                                @else
                                    <p>
                                        <label>Transfer fee: </label> {{ $money*0.05}} VNĐ
                                    </p>
                                @endif
                            @endif
                        @endif
                        <p>
                            <label>Transfer amount: </label> {{ $money }} VNĐ
                        </p>
                        @if($who==0)
                            @if(Auth::user()->id==$user_getter_id)
                                <p>
                                    <label>Transfer fee: </label> 0 VNĐ
                                </p>
                            @else
                                @if($money*0.05>5000)
                                    <p>
                                        <label>Transfer fee: </label> 5000 VNĐ
                                    </p>
                                @else
                                    <p>
                                        <label>Transfer fee: </label> {{ $money*0.05}} VNĐ
                                    </p>
                                @endif
                            @endif
                        @endif
                        <p>
                            <label>Message:</label> {{ $message }}
                        </p>
                        <p>
                            <label>Time:</label> {{ $created_at }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="button-form" style="top: 40px; right: 40px">
                <a href="{{url("user/bankAccount")}}" class="btn" type="submit" style="float: right">Home</a>
            </div>
        </div>
    </section>

@endsection
