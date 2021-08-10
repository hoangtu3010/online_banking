@extends("Admin.layout.admin-layout")
@section("main")
    <form action="{{url("admin/customer/update",["id"=>$data->id])}}" method="post">
        @csrf
        <div class="form-group">
            <label>Account's name</label>
            <input type="text" class="form-control" name="name" value="{{$data->name}}">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" value="{{$data->email}}">
        </div>
        <div class="form-group">
            <label for="">Đặt lại mật khẩu</label>
            <a href="{{url("admin/customer/getPassword",["id"=>$data->id])}}" class="btn btn-outline-primary"> Nhận mật
                khẩu</a>
        </div>
        <div class="form-group">
            <label for="">Customer's name</label>
            <input type="text" class="form-control" name="cusName" value="{{$data->CusName}}">
        </div>
        <div class="form-group">
            <label for="">Birthday</label>
            <input type="date" class="form-control" name="birthday" value="{{$data->birthday}}">
        </div>
        <div class="form-group">
            <label for="">Tel</label>
            <input type="tel" class="form-control" name="tel" value="{{$data->tel}}">
        </div>
        <div class="form-group">
            <label for="">Cmnd</label>
            <input type="text" class="form-control" name="cmnd" value="{{$data->cmnd}}">
        </div>
        <button class="btn btn-outline-success" type="submit">Save</button>
        <a href="{{url("admin/customer")}}" class="btn btn-outline-primary">back</a>
        {{--            <a href="{{url("admin/customer/delete",["id"=>$data->id])}}" class="btn btn-outline-primary">Delete Account</a>--}}
    </form>
@endsection
