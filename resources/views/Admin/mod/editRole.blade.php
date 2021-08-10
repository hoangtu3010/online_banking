@extends("Admin.layout.admin-layout")
@section("main")
    {{--        nothings--}}
    <div class="container">
        <form action="{{url("admin/role/update",["id"=>$data->id])}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{$data->name}}">
            </div>
            <div class="form-group">
                <label for="">Rank</label>
                <input type="number" name="ranker" class="form-control" placeholder="Rank" value="{{$data->ranker}}">
            </div>
            <button type="submit" class="btn btn-outline-success">Add</button>
            <a href="{{url("admin/role")}}" class="btn btn-outline-danger">Back</a>
            <a href="{{url("admin/role/delete",["id"=>$data->id])}}" class="btn btn-outline-success">delete</a>
        </form>
    </div>
@endsection
