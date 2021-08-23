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
                    <h1>Bank Account</h1>
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
                    <h3 class="card-title">Add</h3>
                </div>
                <div class="card-body">
                    <form class="row needs-validation" action="{{url("user/bankAccount/link")}}" method="post"
                          novalidate>
                        @csrf
                        <div class="col-md-12 flex-column pl-3">
                            <div class="form-group">
                                <input name="stk" type="text" class="form-control" id="validationCustom01" placeholder=" " autocomplete="off"
                                       required/>
                                <label for="validationCustom01" class="form-label">Account number</label>
                                <div class="invalid-feedback">
                                    Please enter account account number.
                                </div>
                            </div>

                            <div class="form-group">
                                <input name="password" type="password" class="form-control" id="validationCustom02" placeholder=" "
                                       required/>
                                <label for="validationCustom02" class="form-label">Password</label>
                                <div class="invalid-feedback">
                                    Please enter password.
                                </div>
                            </div>
                            @if($errors->any())
                                <p class="text-red">{{$errors->first()}}</p>
                            @endif
                        </div>
                        <div class="button-form">
                            <button class="btn" type="submit" style="float: right">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
