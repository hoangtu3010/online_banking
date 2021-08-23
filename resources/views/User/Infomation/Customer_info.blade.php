<link rel="stylesheet" href="{{asset('css/customer_info_edit.css')}}">
@extends("layout")
@section("main")
    @foreach($customer as $item)
        {{$item->id}}
        @if(Auth::user()->id == $item->user_id)
            <div>
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
                            <h3>Infomation</h3>
                        </div>
                        <div class="customer_list_all_col">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label" for="">Image</label>
                                    <img src="{{$item->image}}"/>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label" for="">Id</label>
                                    <div type="text" class="form-control">{{$item->id}}</div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="">Name</label>
                                    <div type="text" class="form-control">{{$item->cusName}}</div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="">Birthday</label>
                                    <div type="text" class="form-control">{{$item->birthday}}</div>

                                </div>
                                <div class="col-md-4" style="margin-top: 20px">
                                    <label class="form-label" for="">Phone</label>
                                    <div type="text" class="form-control">{{$item->tel}}</div>

                                </div>
                                <div class="col-md-4" style="margin-top: 20px">
                                    <label class="form-label" for="">Email</label>
                                    <div type="text" class="form-control">{{$item->email}}</div>

                                </div>
                                <div class="col-md-4" style="margin-top: 20px">
                                    <label class="form-label" for="">CMND</label>
                                    <div type="text" class="form-control">{{$item->cmnd}}</div>
                                </div>

                                <div class="col-md-6" style="margin-top: 20px">
                                    <label class="form-label" for="">Address</label>
                                    <input class="form-control" type="text" name="address" value="{{$item->address}}" placeholder="address">
                                </div>

                                <div style="margin-top: 20px ; margin-bottom: 20px">
                                    <a href="{{'/user'}}" class="btn btn-outline-dark">Back</a>
                                    <a href="{{url('user/customer/edit',['id'=>Auth::user()->id])}}"
                                       class="btn btn-outline-primary" style="float: right">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @break($item)
        @endif
        @if( $item->user_id ==null)
            <div>
                <div class="row">
                    <div>
                        <img src="https://bloganh.net/wp-content/uploads/2021/03/chup-anh-dep-anh-sang-min.jpg"
                             height="300px" width="100%" alt="">
                    </div>
                    <div>
                        <h3 style="text-align: center ; padding: 10px 0 10px 0 ">Customer</h3>
                    </div>
                    <div class="customer_list_all">
                        <div class="customer_list_all_info">
                            <h3>Hãy nhập để hoàn thành thông tin cho tài khoản : {{Auth::user()->name}} </h3>
                        </div>
                        <div class="customer_list_all_col">
                            <form action="{{url('user/customer/create')}}" method="post"
                                             enctype="multipart/form-data"
                            >
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label" for="">Name</label>
                                        <input class="form-control" type="text" name="name" placeholder="name">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="">Image</label>
                                        <input class="form-control" type="file" name="image" placeholder="image">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="">Birthday</label>
                                        <input class="form-control" type="date" name="birthday"
                                               placeholder="birthday">
                                    </div>
                                    <div class="col-md-6" style="margin-top: 20px">
                                        <label class="form-label" for="">Phone</label>
                                        <input class="form-control" type="text" name="tel" placeholder="tel">

                                    </div>
                                    <div class="col-md-6" style="margin-top: 20px">
                                        <label class="form-label" for="">CMND</label>
                                        <input class="form-control" type="text" name="cmnd" placeholder="cmnd">
                                    </div>
                                    <div class="col-md-6" style="margin-top: 20px">
                                        <label class="form-label" for="">Address</label>
                                        <input class="form-control" type="text" name="address" placeholder="address">
                                    </div>
                                    <div class="col-md-6" style="margin-top: 20px">
                                        <label class="form-label" for="">User_id</label>
                                        <select name="user_id" class="form-control">
                                            <option value="{{Auth::user()->id}}">{{Auth::user()->id}}</option>
                                        </select>
                                    </div>

                                    <div style="margin-top: 20px ; margin-bottom: 20px">
                                        <a href="{{'/user'}}" class="btn btn-outline-dark">Back</a>
                                        <button type="submit" class="btn btn-outline-primary" style="float: right">
                                            Create
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            @break($item)
        @endif
    @endforeach
@endsection
