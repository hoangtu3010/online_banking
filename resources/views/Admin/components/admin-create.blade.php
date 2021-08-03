@extends("Admin.layout.admin-layout")
@section("main")
    <div class="content-wrapper" style="min-height: 1299.69px;">
        {{--        nothings--}}
        <div class="container">
            <form action="{{url("admin/create")}}" method="post">
                @csrf
                <div class="form-group">
                    <lable>Name</lable>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <lable>Email</lable>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <lable>Password</lable>
                    <input type="password" name="password" class="form-control">

                </div>
                <div class="form-group">
                    <lable>Quyền hạn</lable>
                    <select name="role_id" class="form-control" required>
                        <option  disabled value="" selected>Chọn quyền hạn</option>
                        @foreach($select as $s)
                                <option value="{{$s->id}}">{{$s->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-outline-success" type="submit">
                    Save
                </button>
            </form></div>
    </div>
@endsection
