@extends("layout")
@section("main")
<div class="container">
    <div class="row">
        <table class="table">
{{--            <h1>{{Auth::user()->id}}</h1>--}}
            <thead>
                <tr>
                    <th>Stk</th>
                    <th>Balance</th>
                    <th>Action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $d)
                <tr>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
