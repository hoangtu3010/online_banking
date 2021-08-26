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
                    <h1>Information</h1>
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
                    <h3 class="card-title">Information</h3>
                </div>
                <div class="card-body">
                        @if($customer)
                            <form class="row needs-validation"
                                  action="{{url('user/customer/edit', Auth::user()->id)}}" method="get" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-4 pr-3">
                                    <div class="form-image">
                                        <img src="{{$customer->getImage()}}" style="width: 100%; height: auto;border-radius: 5px"/>
                                    </div>
                                </div>

                                <div class="col-md-8 flex-column pl-3">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" id="validationCustom01"
                                               value="{{$customer->name}}" placeholder=" " disabled/>
                                        <label for="validationCustom01" class="form-label">Name</label>
                                    </div>
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control" id="validationCustom02"
                                               value="{{Auth::user()->email}}" placeholder=" " disabled/>
                                        <label for="validationCustom02" class="form-label">Email</label>
                                    </div>

                                    <div class="form-group">
                                        <input name="birthday" type="date" class="form-control" id="validationCustom04"
                                               value="{{$customer->birthday}}" placeholder=" " disabled/>
                                        <label for="validationCustom04" class="form-label">Birthday</label>
                                    </div>

                                    <div class="form-group">
                                        <input name="tel" type="tel" class="form-control" id="validationCustom05"
                                               value="{{$customer->tel}}" placeholder=" " disabled/>
                                        <label for="validationCustom05" class="form-label">Phone number</label>
                                    </div>

                                    <div class="form-group">
                                        <input name="cmnd" type="text" class="form-control" id="validationCustom06"
                                               value="{{$customer->cmnd}}" placeholder=" " disabled/>
                                        <label for="validationCustom06" class="form-label">Cmnd</label>
                                    </div>
                                    <div class="form-group">
                                <textarea rows="5" name="address" class="form-control" placeholder=" "
                                          id="validationCustom03" disabled>{{$customer->address}}</textarea>
                                        <label for="validationCustom03" class="form-label">Address</label>
                                    </div>
                                </div>
                                <div class="button-form">
                                    <button class="btn" type="submit" style="float: right">Edit</button>
                                </div>
                            </form>
                        @else
                        <form class="row needs-validation"
                              action="{{url('user/customer/create', [Auth::user()->id])}}" method="post"
                              novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-4 pr-3">
                                <div class="form-image">
                                    <i class="ion-upload"></i>
                                    <img src="{{"/upload/default.png"}}" id="img_customer"/>
                                    <input name="image" class="form-control input-customer-image" type="file" id="inputCusImage">
                                </div>
                            </div>

                            <div class="col-md-8 flex-column pl-3">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" id="validationCustom01" placeholder=" " autocomplete="off"
                                           required/>
                                    <label for="validationCustom01" class="form-label">Name</label>
                                    <div class="invalid-feedback">
                                        Please enter name.
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input name="birthday" type="date" class="form-control" id="validationCustom04" placeholder=" "
                                           required/>
                                    <label for="validationCustom04" class="form-label">Birthday</label>
                                    <div class="invalid-feedback">
                                        Please enter birthday.
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input name="tel" type="tel" class="form-control" id="validationCustom05" placeholder=" "
                                           required/>
                                    <label for="validationCustom05" class="form-label">Phone number</label>
                                    <div class="invalid-feedback">
                                        Please enter tel.
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input name="cmnd" type="text" class="form-control" id="validationCustom06" placeholder=" "
                                           required/>
                                    <label for="validationCustom06" class="form-label">Cmnd</label>
                                    <div class="invalid-feedback">
                                        Please enter cmnd.
                                    </div>
                                </div>
                                <div class="form-group">
                                <textarea rows="5" name="address" class="form-control" placeholder=" "
                                          id="validationCustom03"
                                          required></textarea>
                                    <label for="validationCustom03" class="form-label">Address</label>
                                    <div class="invalid-feedback">
                                        Please enter address.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                </div>
                            </div>
                            <div class="button-form">
                                <button class="btn" type="submit" style="float: right">Create</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
