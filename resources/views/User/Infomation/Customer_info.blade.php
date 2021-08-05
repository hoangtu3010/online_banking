<link rel="stylesheet" href="{{asset('css/customer_info_edit.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@extends("layout")
@section("main")
    @foreach($customer as $item)
        @if(Auth::user()->id == $item->id)
    <div>
        <div class="container">
            <div class="row">
                <div >
                    <img src="https://bloganh.net/wp-content/uploads/2021/03/chup-anh-dep-anh-sang-min.jpg" height="400px" width="100%" alt="">
                </div>
                <div>
                    <h3 style="text-align: center ; padding: 10px 0 10px 0 ">Customer</h3>
                </div>
                <div class="customer_list_all">
                    <div class="customer_list_all_info">
                        <h3 >Infomation</h3>
                    </div>
                    <div class="customer_list_all_col">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label" for="">Id</label>
                                    <input type="text" class="form-control" placeholder="name" value="{{$item->id}}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="">Name</label>
                                    <input type="text" class="form-control" placeholder="name" value="{{$item->name}}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="">Birthday</label>
                                    <input type="date" class="form-control" placeholder="name" value="{{$item->birthday}}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="">Phone</label>
                                    <input type="text" class="form-control" placeholder="name" value="{{$item->tel}}">
                                </div>
                                <div class="col-md-4" style="margin-top: 20px">
                                    <label class="form-label" for="">Email</label>
                                    <input type="text" class="form-control" placeholder="name" value="{{$item->email}}">
                                </div>
                                <div class="col-md-4" style="margin-top: 20px">
                                    <label class="form-label" for="">CMND</label>
                                    <input type="text" class="form-control" placeholder="name" value="{{$item->cmnd}}">
                                </div>
                                <div class="col-md-4" style="margin-top: 20px">
                                    <label class="form-label" for="">User_id</label>
                                    <input type="text" class="form-control" placeholder="name" value="{{Auth::user()->id}}">
                                </div>
                                <div style="margin-top: 20px ; margin-bottom: 20px">
                                    <a href="{{'/user'}}" class="btn btn-outline-dark">Back</a>
                                    <a  href="{{url('user/customer/edit',['id'=>$item->id])}}" class="btn btn-outline-primary" style="float: right">Edit</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @endif
    @endforeach
@endsection
