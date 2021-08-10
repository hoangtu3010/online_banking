@extends("Admin.layout.admin-layout")
@section("main")
    <div class="container">
        <form method="post" action="{{url("admin/bankAccount/update",["id"=>$data->id])}} ">
            @csrf
            <h2>Thông tin tài khoảng ngân hàng</h2>

            <div class="form-group">
                <lable>Số tài khoản:</lable>
                <input type="text" disabled class="form-control" value="{{$data->stk}}">
            </div>
            <div class="form-group">

                <lable>Mã bảo mật:</lable>
                <a href="{{ url("admin/bankAccount/getPassword",["id"=>$data->id]) }}" class="btn btn-outline-primary ">Lấy
                    lại mã bảo mật</a>

            </div>

            <div class="form-group">
                <lable>Số dư:</lable>
                <input type="text" name="balance" class="form-control" value="{{$data->balance}}">
            </div>
            <div class="form-group">
                <lable>Người liên kết:</lable>
                {{--                <input type="text"class="form-control" value="{{$data->owner}}">--}}
                <select name="owner" class="form-control">
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
            </div>
            <div class="form-group">
                <lable>Status:</lable>
                {{--                <input type="text"class="form-control" value="{{$data->owner}}">--}}
                <select name="status" class="form-control">
                    @if($data->status=="Active")
                        <option value="Active" selected>Active</option>
                        <option value="Inactive">Inactive</option>
                    @else
                        <option value="Active">Active</option>
                        <option value="Inactive" selected>Inactive</option>
                    @endif
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-outline-success">Save</button>
            <a href="#" class="btn btn-outline-danger">Xóa tài khoản</a>

        </form>
    </div>

@endsection
