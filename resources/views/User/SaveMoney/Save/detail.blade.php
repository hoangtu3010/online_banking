@extends("layout")
@section("main")
    <link rel="stylesheet" href="{{asset("css/form-style.css")}}">

    <div class="bgr-head-list"></div>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 content-header-left">
                    <a href="{{url("user/saveMoney/save")}}">
                        <i class="button-back ion-ios-arrow-thin-left"></i>
                    </a>
                    <h1> Details </h1>
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
                        <div class="card-title">
                             Savings account details
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-check-transfer row">
                        <div class="section-role col-md-6">
                            <p>
                                <label>Account number: </label> <span>{{ $cat->stk }}</span>
                            </p>
                            <p>
                                <label>Amount money: </label> <span>{{ $cat->money}} VNĐ</span>
                            </p>
                            <p>
                                <label>Savings Package: </label> <span>{{$cat->Package->name_package}}</span>
                            </p>
                            <p>
                                <label>Time: </label> <span>{{$cat->Package->time_package}} hours</span>
                            </p>
                            <p>
                                <label>Interest: </label> <span>{{$cat->Package->interest * 100}}%</span>
                            </p>
                            <p>
                                <label>Savings plan: </label> <span>{{$cat->permission}}</span>
                            </p>
                        </div>
                        <div class="border-center"></div>
                        <div class="section-role col-md-6">
                            <p><label>Amount of interest (until now): </label> <span>{{ number_format($h, 2) }} hours</span></p>
                            <p><label>Interest ahead of time ( 1% ) : </label> <span>{{$lai}} VNĐ</span></p>
                            <p><label>Interest after term ( {{$cat->Package->interest * 100}}% ): </label> <span>{{$laihd}} VNĐ</span></p>
                            <hr>

                            <form id="formWithdraw" action="{{url('user/saveMoney/comebackMoney',['id'=>$cat->id])}}" method="post">
                                @csrf
                                <p><label>Current amount can receive: </label> <span>{{$laicc}} VNĐ</span></p>

                                <input type="hidden" name="lai" value="{{$laicc}}">
                                <input type="hidden" name="von" value="{{$cat->money}}">
                                <input type="hidden" name="time" value="{{$h}}">
                                <input type="hidden" name="time_package" value="{{$cat->Package->time_package}}">
                                <button class="btn btn-outline-info" onclick="withdrawClick()" type="button" style="float: right; margin-top: 20px">Withdraw money</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script>

    function withdrawClick(){
        Swal.fire({
            title: 'Are you sure?',
            text: "Are you sure you want to withdraw?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#47b0c2',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("formWithdraw").submit();
            }
        })
    }
</script>

