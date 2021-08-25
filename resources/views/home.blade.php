<link rel="stylesheet" href="{{asset('css/home.css')}}">
@extends("layout")
@section("main")
    <section class="content-header">
        <div class="container-fluid">
            <div class="slider-banner">
                <div class="slides">
                    <input type="radio" checked name="slide-radio" id="slide_radio_1">
                    <input type="radio" name="slide-radio" id="slide_radio_2">
                    <input type="radio" name="slide-radio" id="slide_radio_3">
                    <input type="radio" name="slide-radio" id="slide_radio_4">

                    <div class="slide first">
                        <img src="http://www.elledecoration.vn/wp-content/uploads/2017/10/Bangkok-1.jpg" alt="slide1">
                    </div>
                    <div class="slide first">
                        <img src="https://i.pinimg.com/originals/79/ba/e1/79bae1a5a8b2cb3c050944e32ebcb46c.jpg" alt="slide2">
                    </div>
                    <div class="slide first">
                        <img src="https://i.pinimg.com/originals/79/ba/e1/79bae1a5a8b2cb3c050944e32ebcb46c.jpg" alt="slide3">
                    </div>
                    <div class="slide first">
                        <img src="https://media.istockphoto.com/vectors/online-internet-banking-3d-isometric-banner-a-bank-building-with-of-vector-id1202705835?k=6&m=1202705835&s=612x612&w=0&h=7l9imSOPFmrbi6AfmcPSTl9qbkvbSM-7_zb0K17EC9o=" alt="slide4">
                    </div>

                    <div class="navigation-auto">
                        <div class="auto-btn1"></div>
                        <div class="auto-btn2"></div>
                        <div class="auto-btn3"></div>
                        <div class="auto-btn4"></div>
                    </div>

                    <div class="navigation-manual">
                        <label for="slide_radio_1" class="manual-btn"></label>
                        <label for="slide_radio_2" class="manual-btn"></label>
                        <label for="slide_radio_3" class="manual-btn"></label>
                        <label for="slide_radio_4" class="manual-btn"></label>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content content-main">
        <div class="container-fluid">
            <div class="actions">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url("user/bankAccount")}}" >
                            <i class="nav-icon fas fa-money-check-alt"></i>
                            <p>Bank Account</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url("user/")}}" >
                            <i class="nav-icon fas fa-exchange-alt"></i>
                            <p>Transfer</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('user/saveMoney')}}">
                            <i class="nav-icon fas fa-piggy-bank"></i>
                            <p>Gửi tiết kiệm</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('user/customer')}}">
                            <i class="nav-icon far fa-user"></i>
                            <p>Infomation</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <form method="POST" class="text-center" action="{{ route('logout') }}">
                            @csrf
                            <a class="nav-link" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    {{ __('Log Out') }}
                                </p>
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection
