@extends("Admin.layout.admin-layout")
@section("main")
    <div class="container">
        <form method="post" action="{{url("admin/bankAccount/complete",["id"=>$data->id])}} ">
            @csrf
            <h2>Thông tin tài khoảng ngân hàng</h2>

            <div class="form-group">
                <lable>Số tài khoản:</lable>
                <input type="text" disabled class="form-control" value="{{$data->stk}}">
            </div>
            <div class="form-group">
                <lable>Người liên kết:</lable>
                {{--                <input type="text"class="form-control" value="{{$data->owner}}">--}}
                <select name="owner" class="form-control" disabled>
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
                <lable>Số tiền muốn nạp</lable>
                <input type="text"  class="form-control" name="money" >
                <p class="text-red ">{{ $errors->first('money') }}</p>

            </div>
            <br>
            <button type="submit" class="btn btn-outline-success">Nạp</button>

        </form>
    </div>

@endsection
