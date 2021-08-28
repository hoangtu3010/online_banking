<link rel="stylesheet" href="{{asset('css/SaveMoney.css')}}">
@extends("layout")
@section("main")
    <div style="text-align: center">
        <form action="{{url('user/saveMoney/thongtin',['id'=>$bank->id])}}" method="post">
            @csrf
            <h3>Thông tin tài khoản gửi</h3>
            <label for="">Stk : </label>
            <input type="text" value="{{$bank->stk}}" name="stk">

            <div>
                <label for="">Số dư</label>
                <input type="text" name="balance" value="{{$bank->balance}}">
            </div>
            <div>
                <label for="">Số tiền muốn gửi</label>
                <input type="text" name="money" placeholder="Nhập số tiền ...">
                <p class="text-red ">{{ $errors->first('money') }}</p>
            </div>
            <div>

                <label for="">Chọn gói</label>
                <select name="name_package" class="select-package" onchange="changePackage()" id="selectPackage">
                    <option selected="Selected">Choose...</option>
                    @foreach($package as $p)
                        <option value="{{$p->id}}"> {{$p->name_package}} </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="">Lãi suất</label>
                <input name="interest" type="number" readonly="readonly" id="interestResult">
            </div>
            <div>
                <label for="">Mong muốn gửi</label>
                <select name="desire" id="">
                    <option>Half</option>
                    <option>Full</option>
                </select>
            </div>
            <button type="submit" class="btn btn-outline-primary">Gửi tiền </button>
        </form>
    </div>
@endsection

<script>
    function changePackage(){
        let val_package = document.getElementById("selectPackage").value;


        @foreach($package as $p)
            if (val_package == {{$p->id}}){
                val_package = {{$p->interest}}
            }
        @endforeach

        document.getElementById("interestResult").value = val_package;
    }
</script>
