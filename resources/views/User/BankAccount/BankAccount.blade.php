@extends("layout")
@section("main")
    <link rel="stylesheet" href="{{asset("css/form-style.css")}}">

    <div class="bgr-head-list"></div>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 content-header-left">
                    <a href="{{url("/user")}}">
                        <i class="button-back ion-ios-arrow-thin-left"></i>
                    </a>
                    <h1>Bank Account</h1>
                </div>
                <div class="col-sm-6 action-header">
                    <a href="{{url("user/bankAccount/link")}}">
                        <button class="btn" style="border-radius: 20px">Add Bank Account</button>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @php($i = false)
    @foreach($bank as $item)
        @if($item->user_id === Auth::user()->id)
            @php( $i = true)
        @endif
    @endforeach

    @foreach($data as $d)
        @if(Auth::user()->id == $d->id)
            @if($i == true)
                <section class="content content-main">
                    <div class="container-fluid">
                        <div class="card-body table-responsive table-style">
                            <table class="table table-hover table-form text-center">

                                <thead>
                                <tr>
                                    <th>Account Number</th>
                                    <th>Balance</th>
                                    <th width="5%" colspan="3">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($d->BankAccount as $b)
                                    <tr>
                                        <td>{{$b->stk}}</td>
                                        <td>{{$b->balance}}</td>
                                        <td>
                                            <a href="{{url("user/bankAccount/transfer",["id"=>$b->id])}}">
                                                <i class="fas fa-exchange-alt transfer"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{url("user/bankAccount/history",["id"=>$b->id])}}">
                                                <i class="fas fa-history history"></i>
                                            </a>
                                        </td>
                                        <td aria-label="Detail">
{{--                                            href="{{url("user/bankAccount/info",["id"=>$b->id])}}"--}}
                                            <a type="button" data-toggle="modal" data-target="#detailAccountNumber{{$b->id}}" >
                                                <i class="fas fa-info-circle detail"></i>
                                            </a>
                                        </td>
                                        @include('BankAccount.detailAccountNumber')
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

            @else
                <section class="content content-main">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Account Number Null</h3>
                            </div>
                            <div class="card-body text-center">
                                <p class="text-danger" style="font-size: 6rem"><i class="ion-close-circled"></i></p>
                                <h3>You are not currently associated with any account, <br> please link to trade !</h3>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endif
    @endforeach
@endsection
