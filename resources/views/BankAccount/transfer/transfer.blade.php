@extends("layout")
@section("main")
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <div class="container">
            <form action="{{url("user/bankAccount/next-step",["id"=>$data->id])}}" method="get">
                @csrf
                <div class="form-group">
                    <label for="">Stk gửi:</label>
                    <input type="text" value="{{$data->stk}}"  class="form-control" disabled>
                </div>
                <div class="form-group">

                    <label for="">Stk nhận (Sau này xóa, hiện chỉ để lấy stk) :</label>
                    <select  class="form-control">

                        @foreach($select as $s)
                        <option>{{$s->stk}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="">Stk nhận:</label>
                    <input type="text" name="getter" size="10" class="form-control">
                    <p class="text-red">{{ $errors->first('getter') }}</p>

                </div>
{{--                <div class="form-group">--}}
{{--                    <label for="">Số tiền</label>--}}
{{--                    <input type="number" name="money" min="0" placeholder="Nhập số tiền..."  class="form-control">--}}
{{--                    <p class="text-red ">{{ $errors->first('money') }}</p>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="">Lời nhắn</label>--}}
{{--                    <textarea  name="message"  placeholder="Lời nhắn..."  class="form-control"></textarea>--}}

{{--                </div>--}}

                <button type="submit" class="btn btn-outline-success"> gửi</button>
                <p><a class="btn btn-outline-primary" href="{{url("user/bankAccount/info",["id"=>$data->id])}}">back</a></p>
            </form>

        </div>
    </div>
@endsection
