@extends("Admin.layout.admin-layout")
@section("main")
    <div class="content-wrapper" style="min-height: 1299.69px;">
{{--        nothings--}}
        <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <lable>Name</lable>
                <input type="text" name="name" value="{{$data->__get("name")}}" class="form-control">
            </div>
            <div class="form-group">
                <lable>Email</lable>
                <input type="text" name="email" value="{{$data->__get("email")}}" class="form-control">
            </div>
            <div class="form-group">
                <lable>Quyền</lable>
                <select name="role" class="form-control">
                    <option>Admin</option>
                    <option>Mod+</option>
                    <option>Mod</option>
                </select>
            </div>
        </form></div>
    </div>
@endsection
