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
                    <h3 class="card-title">Enter the desired</h3>
                </div>
                <div class="card-body">
                    <form class="row needs-validation" action="{{url("user/bankAccount/treatment")}}" method="post"
                          novalidate>
                        @csrf
                        <div class="col-md-12 flex-column pl-3">
                            <div class="form-group">
                                <input disabled type="text" class="form-control" id="validationCustom01" value="{{$data->stk}}" placeholder=" " autocomplete="off"
                                       required/>
                                <input type="hidden" value="{{$data->id}}"  name="id_setter" class="form-control">
                                <label for="validationCustom01" class="form-label">Account number sender</label>
                                <div class="invalid-feedback">
                                    Please enter account number sender.
                                </div>
                            </div>

                            <div class="form-group">
                                <input disabled name="getter" type="text" class="form-control" id="validationCustom02" value="{{$getter->stk}}" placeholder=" " autocomplete="off"
                                       required/>
                                <input type="hidden" value="{{$getter->stk}}"  name="getter" class="form-control">
                                <label for="validationCustom02" class="form-label">Account number getter</label>
                                <div class="invalid-feedback">
                                    Please enter account number getter.
                                </div>
                            </div>

                            <div class="form-group">
                                <input disabled type="text" class="form-control" id="validationCustom03" value="{{$getter->user->name}}" placeholder=" "
                                       required/>
                                <input type="hidden" name="user_id_getter" value="{{$getter->User->id}}" class="form-control">
                                <label for="validationCustom03" class="form-label">Getter</label>
                                <div class="invalid-feedback">
                                    Please enter getter.
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="number" name="money" min="0" class="form-control" id="validationCustom04" placeholder=" "
                                       required/>
                                <label for="validationCustom04" class="form-label">Amount of money</label>
                                <div class="invalid-feedback">
                                    Please enter amount of money.
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea type="text" rows="5" name="message" class="form-control" id="validationCustom05" placeholder=" "></textarea>
                                <label for="validationCustom05" class="form-label">Message</label>
                            </div>
                            <div class="form-group fee-bearer">
                                <p>Choose a fee bearer</p>
                                <div class="choose-fee-bearer">
                                    <input id="choose_fee_bearer_you" type="radio" name="fee"  value="0"
                                           checked>
                                    <label for="choose_fee_bearer_you">You</label><br>
                                </div>
                                <div class="choose-fee-bearer">
                                    <input id="choose_fee_bearer_getter" type="radio" name="fee"  value="1">
                                    <label for="choose_fee_bearer_getter">Getter</label><br>
                                </div>
                            </div>
                        </div>
                        <div class="button-form">
                            <button class="btn" type="submit" style="float: right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
