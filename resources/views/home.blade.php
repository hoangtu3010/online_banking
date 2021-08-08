<link rel="stylesheet" href="{{asset('css/home.css')}}">
@extends("layout")
@section("main")
    <div class="xxx">
        {{--{{Auth::user()->id}}
        @foreach($customers as $item)
            @if(Auth::user()->id == $item->id)
                <p>{{$item->name}}</p>
                <p>{{$item->email}}</p>
                <p>{{$item->birthday}}</p>
                <p>{{$item->tel}}</p>
                <p>{{$item->cmnd}}</p>
            @endif
        @endforeach--}}
        <div >
            <img src="https://bloganh.net/wp-content/uploads/2021/03/chup-anh-dep-anh-sang-min.jpg" height="400px" width="100%" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-2 home_home" >
                    <div class="onaji">
                        <a href="" class="home_home_a">
                            <div class="home_surplus">
                                <div class="home_surplus_icon">
                                    <i style="margin-top: 20px" class="fas fa-university"></i>
                                </div>
                                <div>
                                    Surplus
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-2 home_home" >
                    <div class="onaji">
                        <a href="" class="home_home_a">
                            <div class="home_change" >
                                <div class="home_change_icon">
                                    <i style="margin-top: 20px" class="fas fa-exchange-alt"></i>
                                </div>
                                <div class="home_change_title">
                                    Change 24/7
                                </div>
                            </div>

                        </a>
                    </div>
                </div>

                <div class="col-md-2 home_home" >
                    <div class="onaji">
                        <a href="{{url('user/customer')}}" class="home_home_a">
                            <div class="home_people">
                                <div class="home_people_icon">
                                    <i style="margin-top: 20px" class="fas fa-user-tie"></i>
                                </div>
                                <div>
                                    Infomation
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="col-md-2 home_home">
                    <div class="onaji">
                        <a href="" class="home_home_a">
                            <div class="home_history">
                                <div class="home_history_icon">
                                    <i style="margin-top: 20px" class="fas fa-history"></i>
                                </div>
                                <div>
                                    History
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 home_home">
                    <div class="onaji">
                        <a href="{{url("user/bankAccount")}}" class="home_home_a">
                            <div class="home_history">
                            <div class="home_history_icon">
                                <i style="margin-top: 20px" class="fas fa-history"></i>
                            </div>
                            <div>
                                Bank account
                            </div>
                    </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-2 home_home">
                    <div class="onaji">
                        <a href="" class="home_home_a">
                            <div>
                                <div class="home_logout_icon">
                                    <i style="margin-top: 20px" class="fas fa-sign-out-alt"></i>
                                </div>
                                <div>
                                    Logout
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
