<?php
    $cardInfo = \App\Models\BankAccount::all();
    $bankAccount = \App\Models\BankAccount::where("user_id", "=", Auth::user()->id)->get();
?>
<link rel="stylesheet" href="{{asset('css/home.css')}}">
<link rel="stylesheet" href="{{asset('css/form-style.css')}}">
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
                        <img src="{{asset("../imgs/slide-img-1.jpeg")}}" alt="slide1">
                    </div>
                    <div class="slide first">
                        <img src="{{asset("../imgs/slide-img-2.jpeg")}}" alt="slide2">
                    </div>
                    <div class="slide first">
                        <img src="{{asset("../imgs/slide-img-3.jpeg")}}" alt="slide3">
                    </div>
                    <div class="slide first">
                        <img src="{{asset("../imgs/slide-img-4.jpeg")}}" alt="slide4">
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
                            <span>Bank Account</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        @foreach($cardInfo as $card)
                            @if($card->user_id == Auth::user()->id && $card->level == "Main")
                                <a class="nav-link" href="{{url("user/bankAccount/transfer", [$card->id])}}" >
                                    <i class="nav-icon fas fa-exchange-alt"></i>
                                    <span>Transfer</span>
                                </a>
                            @endif
                        @endforeach
                    </li>
                    <li class="nav-item">
                        <a type="button" class="nav-link" data-toggle="modal"
                           data-target="#onlineSavings">
                            <i class="nav-icon fas fa-piggy-bank"></i>
                            <span>Online savings</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('user/customer', ['id'=>Auth::user()->id])}}">
                            <i class="nav-icon far fa-user"></i>
                            <span>Infomation</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <form method="POST" class="text-center" action="{{ route('logout') }}">
                            @csrf
                            <a class="nav-link" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <span>
                                    {{ __('Log Out') }}
                                </span>
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    @include("User.SaveMoney.list")

@endsection
