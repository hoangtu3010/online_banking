@extends("layout")
@section("main")
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <div class="container">
            <form action="{{url("user/bankAccount/loginHidden")}}" method="post">
                @csrf
                <div class="form-group">
                    <input hidden type="text" name="id" value="{{$id}}" class="form-control">
                    <label for=""> Your OTP:</label>
                    <input type="text" name="OTP" class="form-control">
                    <p class="text-red ">{{ $errors->first('OTP') }}</p>

                    <button type="submit" class="btn btn-outline-primary">submit</button>
                    <a href="{{url("user/bankAccount")}}" class="btn btn-outline-primary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
