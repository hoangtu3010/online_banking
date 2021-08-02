@extends("Admin.layout.admin-layout")
@section("main")
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <div class="container">
            <form method="post" action="{{url("admin/bankAccount/update",["id"=>$data->id])}} ">
            <h2>Thông tin tài khoảng ngân hàng</h2>

            <div class="form-group">
                <lable>Số tài khoản:</lable>
                <input type="text" disabled class="form-control" value="{{$data->stk}}">
            </div>
            <div class="form-group">
                <lable>Mã bảo mật:</lable>
                <input type="password" value="{{$data->password}}"  name="password" class="form-control">
            </div>
            <div class="form-group">
                <lable>Số dư:</lable>
                <input type="text" name="balance" class="form-control" value="{{$data->balance}}">
            </div>
            <div class="form-group">
                <lable>Người liên kết:</lable>
                <input type="text"class="form-control" value="{{$data->owner}}">
                <select name="owner" class="form-control">
                    @foreach($select as $s)

                        @if($data->id==$s->id)
                            <option value="{{$s->id}}" selected>{{$s->name}}</option>
                        @else
                            <option value="{{$s->id}}">{{$s->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-outline-success">Save</button>
            <a href="" class="btn btn-outline-danger ms-5">Xóa tài khoản</a>

            </form>
        </div>

    </div>
@endsection
