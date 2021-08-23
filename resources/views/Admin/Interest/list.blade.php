@extends("Admin.layout.admin-layout")
@section("main")
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>stk</th>
            <th>moneySave</th>
            <th>timeSave</th>
            <th>Interest</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cat as $item)
        <tr>
            <th>{{$item->id}}</th>
            <th>{{$item->stk}}</th>
            <th>{{$item->money}}</th>
            <th>{{$item->timeSave}}</th>
{{--            @if($item->timeSave==='3 giờ')--}}
{{--                <th>3%</th>--}}
{{--            @endif--}}
{{--            @if($item->timeSave==='6 giờ')--}}
{{--                <th>6%</th>--}}
{{--            @endif--}}
{{--            @if($item->timeSave==='12 giờ')--}}
{{--                <th>12%</th>--}}
{{--            @endif--}}
            <th>{{$item->interest}}</th>
            <th>
                <a href="{{url('admin/manageInterest/changeInterest',['id'=>$item->id])}}">Thay đổi lãi suất</a>
            </th>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
