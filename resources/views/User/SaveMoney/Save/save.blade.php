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
                    <h1>Savings accounts</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content content-main">
        <div class="container-fluid">
            <div class="card-body table-responsive table-style">
                <table class="table table-hover table-form text-center">

                    <thead>
                    <tr>
                        <th>Account Number</th>
                        <th>Amount money</th>
                        <th>Savings Package</th>
                        <th>Time</th>
                        <th>Interest</th>
                        <th>Savings plan</th>
                        <th>Created at</th>
                        <th width="5%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($save as $item)
                        <tr>
                            <td>{{$item->stk}}</td>
                            <td>{{$item->money}}</td>
                            <td>{{$item->Package->name_package}}</td>
                            <td>{{$item->Package->time_package}}</td>
                            <td>{{$item->Package->interest}}</td>
                            <td>{{$item->permission}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                <a href="{{url('user/saveMoney/watch',['id'=>$item->id])}}">
                                    <i class="fas fa-eye "></i>
                                </a>
                            </td>
{{--                            <td aria-label="Detail">--}}
{{--                                --}}{{--                                            href="{{url("user/bankAccount/info",["id"=>$b->id])}}"--}}
{{--                                <a type="button" data-toggle="modal" data-target="#detailAccountNumber{{$b->id}}" >--}}
{{--                                    <i class="fas fa-info-circle detail"></i>--}}
{{--                                </a>--}}
{{--                            </td>--}}
{{--                            @include('BankAccount.detailAccountNumber')--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

