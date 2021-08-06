<link rel="stylesheet" href="{{asset('css/customer_info_edit.css')}}">
@extends("layout")
@section("main")
    <div>
        <div class="container">
            <div class="row">
                <div>
                    <img src="https://bloganh.net/wp-content/uploads/2021/03/chup-anh-dep-anh-sang-min.jpg"
                         height="400px" width="100%" alt="">
                </div>
                <div>
                    <h3 style="text-align: center ; padding: 10px 0 10px 0 ">Customer</h3>
                </div>
                <div class="customer_list_all">
                    <div class="customer_list_all_info">
                        <h3>Update Customer Infomation</h3>
                    </div>
                    <div class="customer_list_all_col">
                        <form action="{{url('user/customer/save',['id'=>$customer->cusID])}}" method="post">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <label class="form-label" for="">Name</label>
                                    <input type="text" class="form-control" placeholder="name" name="name"
                                           value="{{$customer->cusName}}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="">Birthday</label>
                                    <input type="date" class="form-control" placeholder="name" name="birthday"
                                           value="{{$customer->birthday}}">
                                </div>
                                <div class="col-md-6" style="margin-top: 20px">
                                    <label class="form-label" for="">Phone</label>
                                    <input type="text" class="form-control" placeholder="name" name="tel"
                                           value="{{$customer->tel}}">
                                </div>
                                <div class="col-md-6" style="margin-top: 20px">
                                    <label class="form-label" for="">CMND</label>
                                    <input type="text" class="form-control" placeholder="name" name="cmnd"
                                           value="{{$customer->cmnd}}">
                                </div>
                                {{--<div class="col-md-4" style="margin-top: 20px">
                                    <label class="form-label" for="">Email</label>
                                    <input type="text" class="form-control" placeholder="name"  value="{{$customer->email}}">
                                </div>--}}

                                <div style="margin-top: 20px ; margin-bottom: 20px">
                                    <a href="{{'/user'}}" class="btn btn-outline-dark">Back</a>
                                    <button type="submit" class="btn btn-outline-primary" style="float: right">Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
