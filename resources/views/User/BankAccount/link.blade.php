@extends("layout")
@section("main")
    <div class="row">
        <div>
            <form action="{{url("user/bankAccount/link")}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Stk</label>
                    <input type="text" name="stk" placeholder="Bank account..." class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Pass</label>
                    <input type="password" name="password" placeholder="Password..." class="form-control">
                </div>
                <button class="btn btn-outline-success" type="submit">Submit</button>
                @if($errors->any())
                    <h4 class="text-red">{{$errors->first()}}</h4>
                @endif
                <a class="btn btn-outline-danger" href="{{url("user/bankAccount")}}">Back</a>
            </form>
        </div>
    </div>
@endsection
