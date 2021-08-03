@extends("Admin.layout.admin-layout")
@section("main")
    <div class="content-wrapper" style="min-height: 1299.69px;">
{{--        nothings--}}
        <div class="container">
        <form action="{{url("admin/setting/save",["id"=>$data->id])}}" method="post">
            @csrf
            <div class="form-group">
                <lable>Name</lable>
                <input type="text" name="name" value="{{$data->__get("name")}}" class="form-control">
            </div>
            <div class="form-group">
                <lable>Email</lable>
                <input type="text" name="email" value="{{$data->__get("email")}}" class="form-control">
            </div>
            <div class="form-group">
                <lable>Password</lable>
                <a href="{{url("admin/newPass",["id"=>$data->id])}}" class="btn btn-outline-danger">Đặt lại pass</a>
            </div>
            <div class="form-group">
                <lable>Quyền hạn</lable>
                <select name="role_id" class="form-control" required>
                   @foreach($select as $s)
                       @if($data->role_id==$s->id)
                            <option selected value="{{$s->id}}">{{$s->name}}</option>
                        @else
                            <option value="{{$s->id}}">{{$s->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button class="btn btn-outline-success" type="submit">
                Save
            </button>
        </form></div>
    </div>
@endsection
