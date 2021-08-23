@extends("Admin.layout.admin-layout")
@section("main")
    <h1>Tài khoản cần thay dổi tỉ suất lãi </h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <th>stk</th>
            <th>moneySave</th>
            <th>timeSave</th>
            <th>Interest</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <form action="{{url('admin/manageInterest/actionChange',['id'=>$cat->id])}}" method="post">
            @csrf
            <tr>
                <th>{{$cat->id}}</th>
                <th>{{$cat->stk}}</th>
                <th>{{$cat->money}}</th>
                <th>{{$cat->timeSave}}</th>
                <th>
                    <select name="interest">
                            <option>
                                {{$inserest}}
                            </option>
                        <option >0.01</option>
                        <option >0.02</option>
                        <option >0.03</option>
                        <option >0.04</option>
                        <option >0.05</option>
                        <option >0.06</option>
                        <option >0.07</option>
                        <option >0.08</option>
                        <option >0.09</option>
                        <option >0.1</option>
                        <option >0.11</option>
                        <option >0.12 </option>
                    </select>
                </th>
                <th>
                    <button type="submit" class="btn btn-outline-primary">
                        Thay đổi
                    </button>
                </th>
            </tr>
        </form>
        </tbody>
    </table>
@endsection
