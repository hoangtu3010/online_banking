@extends("Admin.layout.admin-layout")
@section("main")
    <link rel="stylesheet" href="{{asset("css/form-style.css")}}">

    <div class="bgr-head-list"></div>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 content-header-left">
                    <a href="{{url()->previous()}}">
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
                    <h3 class="card-title">Recharge Card</h3>
                </div>
                <div class="card-body">
                    <form class="row needs-validation" action="{{url("admin/bankAccount/complete",["id"=>$data->id])}}" method="post"
                          novalidate>
                        @csrf
                        <div class="col-md-12 flex-column pl-3">
                            <div class="form-group">
                                <input type="text" disabled class="form-control" id="validationCustom01" value="{{$data->stk}}" placeholder=" " autocomplete="off"
                                       required/>
                                <label for="validationCustom01" class="form-label">Account Number</label>
                                <div class="invalid-feedback">
                                    Please enter account number.
                                </div>
                            </div>

                            <div class="form-group">
                                <select disabled name="owner" class="form-control">
                                    @if(!$data->user_id)
                                        <option value="" selected>Chưa liên kết</option>
                                    @else
                                        <option value="">Chưa liên kết</option>
                                    @endif
                                    @foreach($select as $s)
                                        @if($data->user_id==$s->id)
                                            <option value="{{$s->id}}" selected>{{$s->name}}</option>
                                        @else
                                            <option value="{{$s->id}}">{{$s->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <label class="form-label">Owner</label>
                            </div>

                            <div class="form-group">
                                <input name="money" type="text" class="form-control" id="validationCustom02" placeholder=" "
                                       required/>
                                <label for="validationCustom02" class="form-label">Desired amount</label>
                                <p class="text-red ">{{ $errors->first('money') }}</p>
                            </div>
                        </div>
                        <div class="button-form">
                            <button class="btn" type="submit" style="float: right">Recharge</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
