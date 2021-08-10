@extends("Admin.layout.admin-layout")
@section("main")
    <div class="container">
        <form action="{{url("admin/savePass",["id"=>$data->id])}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Email:</label>
                <input class="form-control" disabled type="text" name="email" value="{{$data->email}}">
            </div>
            <div class="form-group">
                <label for="">Mật khẩu mới:</label>
                <input class="form-control" type="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="">Nhập lại mật khẩu mới:</label>
                <input class="form-control" type="password" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-outline-success">Save</button>
            <a class="btn btn-outline-primary" href="{{url("admin/mod")}}">Back</a>
        </form>
    </div>
@endsection
