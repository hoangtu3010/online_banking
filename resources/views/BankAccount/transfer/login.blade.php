@extends("layout")
@section("main")
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <div class="container">
            <form action="{{url("admin/test/login")}}" method="post">
                @csrf
                <div class="form-group">


                    <input hidden type="text" name="stk" value="{{$data->stk}}" class="form-control">

                    <label for=""> PAss:</label>
                    <input type="password" name="password" class="form-control">
                    <button type="submit" class="btn btn-outline-primary">submit</button>
                    <a href="{{url("admin/bankAccount")}}" class="btn btn-outline-primary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
